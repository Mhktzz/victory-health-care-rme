<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\MedicineStock;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    // =============================
    // INDEX
    // =============================
    public function index()
    {
        $medicines = Medicine::with('stocks')->get();

        return view('dashboard.superadmin.obat.index', compact('medicines'));
    }

    // =============================
    // CREATE
    // =============================
    public function create()
    {
        return view('dashboard.superadmin.obat.create');
    }

    // =============================
    // STORE
    // =============================
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

        return redirect()
            ->route('superadmin.obat.index')
            ->with('success', 'Obat berhasil ditambahkan');
    }

    // =============================
    // EDIT
    // =============================
    public function edit(Medicine $medicine)
    {
        $medicine->load('stocks');

        return view('dashboard.superadmin.obat.edit', compact('medicine'));
    }

    // =============================
    // UPDATE
    // =============================
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

        return redirect()
            ->route('superadmin.obat.index')
            ->with('success', 'Data obat berhasil diperbarui');
    }

    // =============================
    // DELETE
    // =============================
    public function destroy(Medicine $medicine)
    {
        $medicine->delete();

        return redirect()
            ->route('superadmin.obat.index')
            ->with('success', 'Obat berhasil dihapus');
    }
}
