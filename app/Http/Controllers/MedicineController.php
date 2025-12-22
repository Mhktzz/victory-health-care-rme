<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\MedicineStock;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    // =============================
    // SUPERADMIN - OBAT
    // =============================
    public function index()
    {
        $medicines = Medicine::with('stocks')->get();
        return view('dashboard.superadmin.obat.index', compact('medicines'));
    }

    public function create()
    {
        return view('dashboard.superadmin.obat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_obat' => 'required|unique:medicines,kode_obat',
            'nama_obat' => 'required',
            'jenis' => 'required',
            'satuan' => 'required',
            'stok' => 'required|integer|min:0',
            'tanggal_kadaluarsa' => 'required|date',
        ]);

        $medicine = Medicine::create([
            'kode_obat' => $request->kode_obat,
            'nama_obat' => $request->nama_obat,
            'jenis' => $request->jenis,
            'satuan' => $request->satuan,
        ]);

        MedicineStock::create([
            'medicine_id' => $medicine->id,
            'stok' => $request->stok,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
        ]);

        return redirect()->route('superadmin.obat.index')
            ->with('success', 'Obat berhasil ditambahkan');
    }

    public function edit(Medicine $medicine)
    {
        $medicine->load('stocks');
        return view('dashboard.superadmin.obat.edit', compact('medicine'));
    }

    public function update(Request $request, Medicine $medicine)
    {
        $request->validate([
            'kode_obat' => 'required',
            'nama_obat' => 'required',
            'jenis' => 'required',
            'satuan' => 'required',
            'stok' => 'required|integer|min:0',
            'tanggal_kadaluarsa' => 'required|date',
        ]);

        $medicine->update([
            'kode_obat' => $request->kode_obat,
            'nama_obat' => $request->nama_obat,
            'jenis' => $request->jenis,
            'satuan' => $request->satuan,
        ]);

        MedicineStock::updateOrCreate(
            ['medicine_id' => $medicine->id],
            [
                'stok' => $request->stok,
                'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
            ]
        );

        return redirect()->route('superadmin.obat.index')
            ->with('success', 'Data obat berhasil diperbarui');
    }

    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        return redirect()->route('superadmin.obat.index')
            ->with('success', 'Obat berhasil dihapus');
    }

    // =============================
    // APOTEKER
    // =============================

    public function apotekerDashboard()
    {
        return view('dashboard.apoteker.index');
    }

    //  DAFTAR RESEP
    public function resepIndex()
    {
        $reseps = [
            [
                'id' => 1,
                'no_resep' => 'RX-2024-002',
                'tanggal' => '2024-12-20 10:30',
                'status' => 'Belum Diproses',
                'nik' => '3201123456780001',
                'dokter' => 'dr. Andi Pratama'
            ],
            [
                'id' => 2,
                'no_resep' => 'RX-2024-003',
                'tanggal' => '2024-12-21 09:15',
                'status' => 'Sudah Diproses',
                'nik' => '3201987654320002',
                'dokter' => 'dr. Sinta Lestari'
            ]
        ];

        return view('dashboard.apoteker.resep', compact('reseps'));
    }

    //  DETAIL RESEP
    public function resepDetail($id)
    {
        $resep = [
            'id' => $id,
            'no_resep' => 'RX-2024-002',
            'tanggal' => '2024-12-20 10:30',
            'status' => 'Belum Diproses',
            'nik' => '3201123456780001',
            'dokter' => 'dr. Andi Pratama',
            'obat' => [
                [
                    'nama' => 'Paracetamol',
                    'dosis' => '500 mg',
                    'frekuensi' => '3x sehari',
                    'durasi' => '5 hari',
                ],
                [
                    'nama' => 'Amoxicillin',
                    'dosis' => '250 mg',
                    'frekuensi' => '2x sehari',
                    'durasi' => '7 hari',
                ]
            ],
            'catatan' => 'Diminum setelah makan'
        ];

        return view('dashboard.apoteker.resep-detail', compact('resep'));
    }

    // TANDAI SELESAI
    public function resepSelesai($id)
    {
        return redirect()->route('dashboard.apoteker.resep')
            ->with('success', 'Resep berhasil diproses');
    }

    public function stokIndex()
    {
        return view('dashboard.apoteker.stok');
    }

    public function riwayatIndex()
    {
        return view('dashboard.apoteker.riwayat');
    }

     public function stok()
    {
    return view('dashboard.apoteker.stok');
    }

}