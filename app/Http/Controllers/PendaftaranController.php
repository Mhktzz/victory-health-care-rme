<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    // TAMPILKAN DATA PASIEN
    public function index()
    {
        $patients = Patient::latest()->get();
        return view('dashboard.pendaftaran.patients', compact('patients'));
    }

    // FORM TAMBAH PASIEN
    public function create()
    {
        return view('dashboard.pendaftaran.create');
    }

    // SIMPAN DATA PASIEN
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:patients',
            'no_rm' => 'required|unique:patients',
            'nama' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'telepon' => 'required',
            'status_pasien' => 'required'
        ]);

        Patient::create($request->all());

        return redirect()
            ->route('pendaftaran.patients')
            ->with('success', 'Pasien berhasil ditambahkan');
    }

    // FORM EDIT
    public function edit(Patient $patient)
    {
        return view('dashboard.pendaftaran.edit', compact('patient'));
    }

    // UPDATE DATA
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'nik' => 'required|unique:patients,nik,' . $patient->id,
            'no_rm' => 'required|unique:patients,no_rm,' . $patient->id,
            'nama' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'telepon' => 'required',
            'status_pasien' => 'required'
        ]);

        $patient->update($request->all());

        return redirect()
            ->route('pendaftaran.patients')
            ->with('success', 'Data pasien berhasil diperbarui');
    }

    // DELETE PASIEN ✅
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()
            ->route('pendaftaran.patients')
            ->with('success', 'Data pasien berhasil dihapus');
    }
}
