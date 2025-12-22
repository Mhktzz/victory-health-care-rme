<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    /* =========================
     |  SUPER ADMIN
     ========================= */

    public function indexSuperadmin()
    {
        $patients = Patient::latest()->get();
        return view('dashboard.superadmin.datapasien.index', compact('patients'));
    }

    public function showSuperadmin(Patient $patient)
    {
        return view('dashboard.superadmin.datapasien.show', compact('patient'));
    }

    /* =========================
     |  MANAJER
     ========================= */

    public function indexManajer()
    {
        $patients = Patient::latest()->get();
        return view('dashboard.manajer.datapasien.index', compact('patients'));
    }

    public function showManajer(Patient $patient)
    {
        return view('dashboard.manajer.datapasien.show', compact('patient'));
    }

    /* =========================
     |  PENDAFTARAN
     ========================= */

    public function indexPendaftaran()
    {
        $patients = Patient::latest()->get();
        return view('dashboard.pendaftaran.patient.index', compact('patients'));
    }

    public function showPendaftaran(Patient $patient)
    {
        return view('dashboard.pendaftaran.patient.show', compact('patient'));
    }

    /* =========================
     |  CREATE (SHARED)
     ========================= */

    public function create()
    {
        $role = Auth::user()->role;

        if ($role === 'super_admin') {
            return view('dashboard.superadmin.datapasien.create');
        }

        if ($role === 'pendaftaran') {
            return view('dashboard.pendaftaran.patient.create');
        }

        abort(403);
    }

    /* =========================
     |  STORE
     ========================= */

    public function store(Request $request)
    {
        $request->validate([
            'nik'            => 'required|digits:16|unique:patients,nik',
            'nama'           => 'required|string|max:255',
            'tanggal_lahir'  => 'required|date',
            'jenis_kelamin'  => 'required|in:L,P',
            'telepon'        => 'required|string|max:20',
        ]);

        Patient::create([
            'nik'            => $request->nik,
            'no_rm'          => 'RM-' . now()->format('YmdHis') . rand(100, 999),
            'nama'           => $request->nama,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'jenis_kelamin'  => $request->jenis_kelamin,
            'telepon'        => $request->telepon,
            'status_pasien'  => 'baru',
        ]);

        if (Auth::user()->role === 'super_admin') {
            return redirect()
                ->route('dashboard.superadmin.datapasien.index')
                ->with('success', 'Data pasien berhasil ditambahkan');
        }

        if (Auth::user()->role === 'pendaftaran') {
            return redirect()
                ->route('dashboard.pendaftaran.patient.index')
                ->with('success', 'Data pasien berhasil ditambahkan');
        }

        abort(403);
    }

    /* =========================
     |  EDIT
     ========================= */

    public function edit(Patient $patient)
    {
        if (Auth::user()->role === 'super_admin') {
            return view('dashboard.superadmin.datapasien.edit', compact('patient'));
        }

        if (Auth::user()->role === 'pendaftaran') {
            return view('dashboard.pendaftaran.patient.edit', compact('patient'));
        }

        abort(403);
    }

    /* =========================
     |  UPDATE
     ========================= */

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'nik'            => 'required|digits:16|unique:patients,nik,' . $patient->id,
            'nama'           => 'required|string|max:255',
            'tanggal_lahir'  => 'required|date',
            'jenis_kelamin'  => 'required|in:L,P',
            'telepon'        => 'required|string|max:20',
        ]);

        $patient->update([
            'nik'            => $request->nik,
            'nama'           => $request->nama,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'jenis_kelamin'  => $request->jenis_kelamin,
            'telepon'        => $request->telepon,
        ]);

        return redirect()->back()->with('success', 'Data pasien berhasil diperbarui');
    }

    /* =========================
     |  DELETE
     ========================= */

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->back()->with('success', 'Data pasien berhasil dihapus');
    }
}
