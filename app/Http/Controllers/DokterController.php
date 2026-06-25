<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Patient;
use App\Models\MedicalRecord;
use App\Models\User;
use App\Models\MedicineStock;
use App\Models\Icd10;
use App\Models\Obat;
use App\Models\Prescription;
use App\Models\PrescriptionItem;
use Illuminate\Support\Facades\Auth;

class DokterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ANTRIAN DOKTER
    |--------------------------------------------------------------------------
    */
    public function queue()
    {
        $reservations = Reservation::with(['patient', 'doctor'])
            ->where('doctor_id', Auth::id())
            ->where('status', 'menunggu_dokter')
            ->orderBy('jam', 'asc')
            ->get();

        foreach ($reservations as $res) {
            $record = MedicalRecord::where('patient_id', $res->patient_id)
                ->where('doctor_id', $res->doctor_id)
                ->whereDate('tanggal_kunjungan', $res->tanggal)
                ->first();
            $res->medical_record_id = $record ? $record->id : null;
        }

        return view('dashboard.dokter.queue', compact('reservations'));
    }

    /*
    |--------------------------------------------------------------------------
    | PANGGIL PASIEN
    |--------------------------------------------------------------------------
    |
    */
    public function callPatient($reservationId)
    {
        $reservation = Reservation::findOrFail($reservationId);

        // Update status ke sedang_diperiksa
        $reservation->update(['status' => 'sedang_diperiksa']);

        $record = MedicalRecord::where('patient_id', $reservation->patient_id)
            ->where('doctor_id', $reservation->doctor_id)
            ->whereDate('tanggal_kunjungan', $reservation->tanggal)
            ->first();

        return redirect()->route('dashboard.dokter.record', $record->id)
            ->with('success', 'Pasien berhasil dipanggil');
    }

    /*
    |--------------------------------------------------------------------------
    | FORM REKAM MEDIS
    |--------------------------------------------------------------------------
    */
    public function record($id)
    {
        $record = MedicalRecord::with([
            'patient',
            'vitalSign'
        ])->findOrFail($id);

        $icd10s = Icd10::orderBy('kode')->get();
        $obats  = Obat::orderBy('nama_obat')->get();

        return view('dashboard.dokter.record', compact(
            'record',
            'icd10s',
            'obats'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN REKAM MEDIS + RESEP
    |--------------------------------------------------------------------------
    */
    public function storeRecord(Request $request, $id)
    {
        $record = MedicalRecord::findOrFail($id);

        // ================= VALIDASI =================
        $data = $request->validate([
            'keluhan_utama' => 'nullable|string',
            'diagnosa'      => 'nullable|string',
            'tindakan'      => 'nullable|string',

            'obat'          => 'array',
            'obat.*'        => 'nullable|exists:medicines,id',

            'jumlah'        => 'array',
            'jumlah.*'      => 'nullable|integer|min:1',

            'dosis'         => 'array',
            'dosis.*'       => 'nullable|string',
            'aturan_pakai'  => 'array',
            'aturan_pakai.*'=> 'nullable|string',
        ]);

        // ================= UPDATE REKAM MEDIS =================
        $record->update([
            'keluhan_utama' => $data['keluhan_utama'] ?? null,
            'diagnosa'      => $data['diagnosa'] ?? null,
            'tindakan'      => $data['tindakan'] ?? null,
            'status'        => 'lengkap',
        ]);

        // ================= SIMPAN RESEP =================
        if (!empty($request->obat) && count(array_filter($request->obat))) {

            $prescription = Prescription::create([
                'medical_record_id' => $record->id,
                'dokter_id'        => $record->doctor_id, // 🔥 FIX UTAMA
                'status'           => 'belum'
            ]);

            foreach ($request->obat as $index => $obatId) {

                if (!$obatId) continue;

                PrescriptionItem::create([
                    'prescription_id' => $prescription->id,
                    'medicine_id'     => $obatId,
                    'jumlah'          => $request->jumlah[$index] ?? 1,
                    'dosis'           => $request->dosis[$index] ?? null,
                    'aturan_pakai'    => $request->aturan_pakai[$index] ?? null,
                ]);
            }
        }

        // ================= UPDATE STATUS ANTRIAN =================
        Reservation::where('patient_id', $record->patient_id)
            ->where('doctor_id', $record->doctor_id)
            ->whereDate('tanggal', $record->tanggal_kunjungan)
            ->where('status', 'sedang_diperiksa')
            ->update([
                'status' => 'selesai'
            ]);

        return redirect()
            ->route('dashboard.dokter')
            ->with('success', 'Rekam medis & resep berhasil disimpan.');
    }

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $patientsToday = Reservation::whereDate('tanggal', now()->toDateString())
            ->where('doctor_id', Auth::id())
            ->count();

        $totalPatients = Patient::count();

        $dokterActive = User::where('role', 'dokter')->count();

        $stokObat = MedicineStock::sum('stok');

        $records = MedicalRecord::with('patient')
            ->where('doctor_id', Auth::id())
            ->where('status', 'lengkap')
            ->latest()
            ->limit(10)
            ->get();

        return view(
            'dashboard.dokter.index',
            compact(
                'patientsToday',
                'totalPatients',
                'dokterActive',
                'stokObat',
                'records'
            )
        );
    }
}
