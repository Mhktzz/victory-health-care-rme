<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::all();
        return view('dashboard.superadmin.obat.index', compact('medicines'));
    }

    public function create()
    {
        return view('dashboard.superadmin.obat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_obat' => 'required|unique:medicines',
            'nama_obat' => 'required',
            'jenis' => 'required',
            'satuan' => 'required',
        ]);

        Medicine::create($request->all());

        return redirect()
            ->route('superadmin.obat.index')
            ->with('success', 'Obat berhasil ditambahkan');
    }

    public function show(Medicine $medicine)
    {
        return view('dashboard.superadmin.obat.show', compact('medicine'));
    }

    public function edit(Medicine $medicine)
    {
        return view('dashboard.superadmin.obat.edit', compact('medicine'));
    }

    public function update(Request $request, Medicine $medicine)
    {
        $medicine->update($request->all());

        return redirect()
            ->route('superadmin.obat.index')
            ->with('success', 'Obat berhasil diperbarui');
    }

    public function destroy(Medicine $medicine)
    {
        $medicine->delete();

        return back()->with('success', 'Obat berhasil dihapus');
    }
}
