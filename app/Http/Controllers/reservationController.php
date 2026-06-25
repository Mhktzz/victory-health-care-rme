<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Patient;
use App\Models\Layanan;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['patient', 'doctor'])->latest()->get();
        return view('dashboard.pendaftaran.reservasi.index', compact('reservations'));
    }

    public function create()
    {
        $patients = Patient::all();
        $layanans = Layanan::orderBy('kategori')->orderBy('nama_layanan')->get();

        // ambil user dengan role dokter
        $dokters = User::where('role', 'dokter')->get();

        return view(
            'dashboard.pendaftaran.reservasi.create',
            compact('patients', 'layanans', 'dokters')
        );
    }
    public function show(Reservation $reservasi)
    {
        return view('dashboard.pendaftaran.reservasi.view', compact('reservasi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id'     => 'required|exists:patients,id',
            'doctor_id'      => 'required|exists:users,id',
            'jenis_layanan'  => 'required|string',
            'tanggal'        => 'required|date',
            'jam'            => 'required',
            'keluhan'        => 'nullable|string',
        ]);

        Reservation::create([
            'patient_id'     => $request->patient_id,
            'doctor_id'      => $request->doctor_id,
            'jenis_layanan'  => $request->jenis_layanan,
            'tanggal'        => $request->tanggal,
            'jam'            => $request->jam,
            'keluhan'        => $request->keluhan,
            'status'         => 'menunggu',
        ]);

        return redirect()
            ->route('dashboard.pendaftaran.reservasi.index')
            ->with('success', 'Reservasi berhasil ditambahkan');
    }

    public function edit(Reservation $reservasi)
    {
        $patients = Patient::all();
        $layanans = Layanan::orderBy('kategori')->orderBy('nama_layanan')->get();
        $dokters = User::where('role', 'dokter')->get();

        return view(
            'dashboard.pendaftaran.reservasi.edit',
            compact('reservasi', 'patients', 'layanans', 'dokters')
        );
    }

    public function update(Request $request, Reservation $reservasi)
    {
        $request->validate([
            'patient_id'     => 'required|exists:patients,id',
            'doctor_id'      => 'required|exists:users,id',
            'jenis_layanan'  => 'required',
            'tanggal'        => 'required|date',
            'jam'            => 'required',
            'status'         => 'required',
            'keluhan'        => 'nullable',
        ]);

        $reservasi->update([
            'patient_id'     => $request->patient_id,
            'doctor_id'      => $request->doctor_id,
            'jenis_layanan'  => $request->jenis_layanan,
            'tanggal'        => $request->tanggal,
            'jam'            => $request->jam,
            'status'         => $request->status,
            'keluhan'        => $request->keluhan,
        ]);

        return redirect()
            ->route('dashboard.pendaftaran.reservasi.index')
            ->with('success', 'Reservasi diperbarui');
    }
    public function destroy(Reservation $reservasi)
    {
        $reservasi->delete();

        return redirect()
            ->route('dashboard.pendaftaran.reservasi.index')
            ->with('success', 'Reservasi dihapus');
    }
}
