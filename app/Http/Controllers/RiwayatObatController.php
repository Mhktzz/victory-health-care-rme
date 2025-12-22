<?php

namespace App\Http\Controllers;

use App\Models\RiwayatObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatObatController extends Controller
{
    public function index(Request $request)
    {
        // ================== LIST RIWAYAT ==================
        $riwayat = RiwayatObat::with([
                'pasien',
                'dokter',
                'items.obat'
            ])
            ->latest()
            ->paginate(10);

        // ================== SUMMARY ==================
        $totalTransaksi = RiwayatObat::count();

        $totalPasien = RiwayatObat::distinct('pasien_id')->count('pasien_id');

        $totalObatKeluar = DB::table('riwayat_obat_items')->sum('jumlah');

        return view('dashboard.apoteker.riwayat', compact(
            'riwayat',
            'totalTransaksi',
            'totalPasien',
            'totalObatKeluar'
        ));
    }
}
