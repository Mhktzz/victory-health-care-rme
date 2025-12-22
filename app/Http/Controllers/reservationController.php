<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // =====================
    // INDEX
    // =====================
    public function index()
    {
        $reservations = Reservation::latest()->get();
        return view('dashboard.pendaftaran.reservasi.index', compact('reservations'));
    }
    public function create()
{
    return view('dashboard.pendaftaran.reservasi.create');
}

// =====================
// SHOW (VIEW DETAIL)
// =====================
public function show(Reservation $reservasi)
{
    return view(
        'dashboard.pendaftaran.reservasi.view',
        compact('reservasi')
    );
}


    // =====================
    // STORE
    // =====================
    public function store(Request $request)
    {
        $request->validate([
            'pasien_identitas' => 'required',
            'jenis_layanan' => 'required',
            'dokter' => 'required',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'keluhan' => 'nullable',
        ]);

        Reservation::create([
            'pasien_identitas' => $request->pasien_identitas,
            'jenis_layanan' => $request->jenis_layanan,
            'dokter' => $request->dokter,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'keluhan' => $request->keluhan,
            'status' => 'menunggu',
        ]);

        return redirect()
            ->route('dashboard.pendaftaran.reservasi.index')
            ->with('success', 'Reservasi berhasil ditambahkan');
    }

    // =====================
    // EDIT
    // =====================
    public function edit(Reservation $reservasi)
    {
        return view('dashboard.pendaftaran.reservasi.edit', compact('reservasi'));
    }

    // =====================
    // UPDATE
    // =====================
    public function update(Request $request, Reservation $reservasi)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $reservasi->update($request->all());

        return redirect()
            ->route('dashboard.pendaftaran.reservasi.index')
            ->with('success', 'Reservasi diperbarui');
    }

    // =====================
    // DELETE
    // =====================
    public function destroy(Reservation $reservasi)
    {
        $reservasi->delete();

        return redirect()
            ->route('dashboard.pendaftaran.reservasi.index')
            ->with('success', 'Reservasi dihapus');
    }
}
