<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use App\Models\Reservation;

class AntrianController extends Controller
{
    public function index()
    {
        // Ambil data reservasi + relasi pasien
        $reservations = Reservation::with('patient')
            ->orderBy('tanggal')
            ->orderBy('jam')
            ->get();

        return view('perawat.antrian.index', compact('reservations'));
    }
}
