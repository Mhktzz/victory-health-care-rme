<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerawatController extends Controller
{
    public function index() {
        return view('dashboard.perawat.dashboardperawat');
    }

    public function create($id) {
        // Menuju form input vital sign
        return view('dashboard.perawat.pemeriksaanawal', compact('id'));
    }

    public function store(Request $request) {
        // Logika simpan ke database di sini nantinya
        return redirect()->route('dashboard.perawat.antrianpemeriksaanawal')
                         ->with('success', 'Data pemeriksaan berhasil dikirim ke dokter');
    }

    public function antrian() {
        // Menuju tabel riwayat pemeriksaan
        return view('dashboard.perawat.antrianpemeriksaanawal');
    }
}