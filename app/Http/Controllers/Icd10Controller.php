<?php

namespace App\Http\Controllers;

use App\Models\Icd10;
use Illuminate\Http\Request;

class Icd10Controller extends Controller
{

    public function index()
    {
        $icd10 = Icd10::orderBy('kode')->get();
        return view('dashboard.superadmin.icd10.index', compact('icd10'));
    }



    public function create()
    {
        return view('dashboard.superadmin.icd10.create');
    }
    public function show(Icd10 $icd10)
    {
        return view('dashboard.superadmin.icd10.show', compact('icd10'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:icd10,kode',
            'nama_penyakit' => 'required',
            'kategori' => 'required',
        ]);

        Icd10::create([
            'kode' => $request->kode,
            'nama_penyakit' => $request->nama_penyakit,
            'kategori' => $request->kategori,
        ]);

        return redirect()
            ->route('dashboard.superadmin.icd10.index')
            ->with('success', 'Data ICD-10 berhasil ditambahkan');
    }
    // FORM EDIT
    public function edit(Icd10 $icd10)
    {
        return view('dashboard.superadmin.icd10.edit', compact('icd10'));
    }

    // UPDATE DATA
    public function update(Request $request, Icd10 $icd10)
    {
        $request->validate([
            'kode' => 'required|unique:icd10,kode,' . $icd10->id,
            'nama_penyakit' => 'required',
            'kategori' => 'required',
        ]);

        $icd10->update([
            'kode' => $request->kode,
            'nama_penyakit' => $request->nama_penyakit,
            'kategori' => $request->kategori,
        ]);

        return redirect()
            ->route('dashboard.superadmin.icd10.index')
            ->with('success', 'Data ICD-10 berhasil diperbarui');
    }
    public function destroy(Icd10 $icd10)
    {
        $icd10->delete();

        return redirect()
            ->route('dashboard.superadmin.icd10.index')
            ->with('success', 'Data ICD-10 berhasil dihapus');
    }
}
