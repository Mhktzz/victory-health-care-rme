<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\MedicineStock;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Prescription;
use App\Models\PrescriptionItem;
use App\Models\RiwayatObat;
use App\Models\RiwayatObatItem;

use Midtrans\Config;
use Midtrans\Snap;

class ObatController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    /*
    |-----------------------------------------
    | RESEP MASUK
    |-----------------------------------------
    */
    public function resepMasuk()
    {
        $reseps = Prescription::with([
            'medicalRecord.patient',
            'medicalRecord.doctor',
            'items.obat'
        ])->latest()->get();

        $selesai = $reseps->where('status', 'selesai')->count();
        $belum = $reseps->where('status', 'belum')->count();

        return view('dashboard.apoteker.resep', compact(
            'reseps',
            'selesai',
            'belum'
        ));
    }

    /*
    |-----------------------------------------
    | DETAIL RESEP
    |-----------------------------------------
    */
    public function showResep($id)
    {
        $resep = Prescription::with([
            'medicalRecord.patient',
            'medicalRecord.doctor',
            'items.obat'
        ])->findOrFail($id);

        return view('dashboard.apoteker.resep.show', compact('resep'));
    }

    /*
    |-----------------------------------------
    | 💳 BAYAR MIDTRANS
    |-----------------------------------------
    */
    public function bayar($id)
    {
        $resep = Prescription::with('items.obat', 'medicalRecord.patient')
            ->findOrFail($id);

        $total = 0;

        foreach ($resep->items as $item) {
            $total += $item->jumlah * 10000;
        }

        if ($total <= 0) {
            return response()->json(['error' => 'Total tidak valid'], 400);
        }

        $params = [
            'transaction_details' => [
                'order_id' => 'RX-' . $resep->id . '-' . time(),
                'gross_amount' => $total,
            ],
            'customer_details' => [
                'first_name' => $resep->medicalRecord->patient->nama,
            ],
        ];

        try {
            $snapToken = \Midtrans\Snap::getSnapToken($params);

            $resep->update([
                'snap_token' => $snapToken
            ]);

            return response()->json([
                'snap_token' => $snapToken
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /*
    |-----------------------------------------
    | ✅ SETELAH BAYAR
    |-----------------------------------------
    */
    public function paymentSuccess($id)
    {
        $resep = Prescription::findOrFail($id);

        $resep->update([
            'payment_status' => 'paid'
        ]);

        return response()->json(['success' => true]);
    }

    /*
    |-----------------------------------------
    | ⚙️ PROSES RESEP
    |-----------------------------------------
    */
    public function prosesResep($id)
    {
        $resep = Prescription::with([
            'items',
            'medicalRecord.patient'
        ])->findOrFail($id);

        // ❌ jangan proses kalau belum bayar
        if ($resep->payment_status !== 'paid') {
            return back()->with('error', 'Resep belum dibayar!');
        }

        foreach ($resep->items as $item) {

            $obat = Obat::findOrFail($item->medicine_id);
            $stock = $obat->stock;

            if (!$stock) {
                return back()->with('error', 'Stok obat untuk ' . $obat->nama_obat . ' belum tersedia');
            }

            // cek stok
            if ($stock->stok < $item->jumlah) {
                return back()->with('error', 'Stok obat ' . $obat->nama_obat . ' tidak cukup');
            }

            // kurangi stok
            $stock->stok -= $item->jumlah;
            $stock->save();
        }

        // update status resep
        $resep->update([
            'status' => 'selesai'
        ]);

        /*
        |-----------------------------------------
        | 🧾 SIMPAN KE RIWAYAT OBAT
        |-----------------------------------------
        */
        $riwayat = RiwayatObat::create([
            'no_resep' => 'RX-' . $resep->id,
            'pasien_id' => $resep->medicalRecord->patient_id,
            'dokter_id' => $resep->medicalRecord->doctor_id,
            'tanggal' => now()
        ]);

        foreach ($resep->items as $item) {
            RiwayatObatItem::create([
                'riwayat_obat_id' => $riwayat->id,
                'obat_id' => $item->medicine_id,
                'jumlah' => $item->jumlah
            ]);
        }

        return back()->with('success', 'Resep berhasil diproses, stok berkurang & masuk riwayat');
    }

    /*
    |-----------------------------------------
    | DATA OBAT
    |-----------------------------------------
    */
    public function index(Request $request)
    {
        $obats = Obat::with('stock')
            ->when($request->search, function ($q) use ($request) {
                $q->where(function ($qq) use ($request) {
                    $qq->where('nama_obat', 'like', '%' . $request->search . '%')
                        ->orWhere('kode_obat', 'like', '%' . $request->search . '%');
                });
            })
            ->when($request->jenis, function ($q) use ($request) {
                $q->where('jenis', $request->jenis);
            })
            ->orderBy('nama_obat')
            ->paginate(10);

        $stokMenipis = Obat::whereHas('stock', function ($q) {
            $q->whereColumn('stok', '<=', 'stok_minimum');
        })->count();

        $obatKadaluarsa = Obat::whereHas('stock', function ($q) {
            $q->whereDate('tanggal_kadaluarsa', '<=', Carbon::now()->addDays(60));
        })->count();

        return view('dashboard.apoteker.stok_obat', compact(
            'obats',
            'stokMenipis',
            'obatKadaluarsa'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_obat' => 'required|unique:medicines,kode_obat',
            'nama_obat' => 'required|string',
            'jenis' => 'required|string',
            'satuan' => 'required|string',
            'stok_tersedia' => 'required|integer|min:0',
            'stok_minimum' => 'required|integer|min:0',
            'tanggal_kadaluarsa' => 'required|date',
        ]);

        $obat = Obat::create([
            'kode_obat' => $request->kode_obat,
            'nama_obat' => $request->nama_obat,
            'jenis' => $request->jenis,
            'satuan' => $request->satuan,
        ]);

        MedicineStock::create([
            'medicine_id' => $obat->id,
            'stok' => $request->stok_tersedia,
            'stok_minimum' => $request->stok_minimum,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
        ]);

        return back()->with('success', 'Obat berhasil ditambahkan');
    }

    public function update(Request $request, Obat $obat)
    {
        $request->validate([
            'kode_obat' => 'required|unique:medicines,kode_obat,' . $obat->id,
            'nama_obat' => 'required|string',
            'jenis' => 'required|string',
            'satuan' => 'required|string',
            'stok_tersedia' => 'required|integer|min:0',
            'stok_minimum' => 'required|integer|min:0',
            'tanggal_kadaluarsa' => 'required|date',
        ]);

        $obat->update([
            'kode_obat' => $request->kode_obat,
            'nama_obat' => $request->nama_obat,
            'jenis' => $request->jenis,
            'satuan' => $request->satuan,
        ]);

        MedicineStock::updateOrCreate(
            ['medicine_id' => $obat->id],
            [
                'stok' => $request->stok_tersedia,
                'stok_minimum' => $request->stok_minimum,
                'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
            ]
        );

        return back()->with('success', 'Obat berhasil diperbarui');
    }

    public function destroy(Obat $obat)
    {
        $obat->delete();

        return back()->with('success', 'Obat berhasil dihapus');
    }
    public function notificationHandler(Request $request)
    {
        $notif = new \Midtrans\Notification();

        $transaction  = $notif->transaction_status;
        $fraud        = $notif->fraud_status;
        $orderId      = $notif->order_id; // format: RX-{id}-{time}

        // Ambil ID resep dari order_id
        $parts   = explode('-', $orderId); // ['RX', '{id}', '{time}']
        $resepId = $parts[1] ?? null;

        if (!$resepId) {
            return response()->json(['message' => 'Invalid order id'], 400);
        }

        $resep = Prescription::find($resepId);

        if (!$resep) {
            return response()->json(['message' => 'Resep not found'], 404);
        }

        // Logika status
        if ($transaction == 'capture') {
            if ($fraud == 'challenge') {
                $resep->update(['payment_status' => 'challenge']);
            } elseif ($fraud == 'accept') {
                $resep->update(['payment_status' => 'paid']);
            }
        } elseif ($transaction == 'settlement') {
            $resep->update(['payment_status' => 'paid']);
        } elseif (in_array($transaction, ['cancel', 'deny', 'expire'])) {
            $resep->update(['payment_status' => 'failed']);
        } elseif ($transaction == 'pending') {
            $resep->update(['payment_status' => 'pending']);
        }

        return response()->json(['message' => 'OK']);
    }
}
