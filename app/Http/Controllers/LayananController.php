<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LayananController extends Controller
{
    /* =========================
     |  MANAJER
     ========================= */
    public function indexManajer()
    {
        $layanan = Layanan::latest()->get();
        return view('dashboard.manajer.layanan.index', compact('layanan'));
    }

    public function showManajer(Layanan $layanan)
    {
        return view('dashboard.manajer.layanan.show', compact('layanan'));
    }

    /* =========================
     |  SUPER ADMIN
     ========================= */
    public function indexSuperadmin()
    {
        $layanan = Layanan::latest()->get();
        return view('dashboard.superadmin.layanan.index', compact('layanan'));
    }

    public function showSuperadmin(Layanan $layanan)
    {
        return view('dashboard.superadmin.layanan.show', compact('layanan'));
    }

    /* =========================
     |  SHARED
     ========================= */
    public function create()
    {
        $kategoriList = [
            'Pemeriksaan',
            'Tindakan Medis',
            'Laboratorium',
            'Rawat Jalan',
            'Lainnya',
        ];

        $role = Auth::user()->role;

        if ($role === 'super_admin') {
            return view('dashboard.superadmin.layanan.create', compact('kategoriList'));
        }

        if ($role === 'manajer') {
            return view('dashboard.manajer.layanan.create', compact('kategoriList'));
        }

        abort(403);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string',
            'nama_layanan' => 'required|string|max:255',
            'tarif' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
        ]);

        Layanan::create($request->all());

        $role = Auth::user()->role;

        if ($role === 'super_admin') {
            return redirect()
                ->route('dashboard.superadmin.layanan.index')
                ->with('success', 'Layanan berhasil ditambahkan');
        }

        if ($role === 'manajer') {
            return redirect()
                ->route('dashboard.manajer.layanan.index')
                ->with('success', 'Layanan berhasil ditambahkan');
        }

        abort(403);
    }


    public function edit(Layanan $layanan)
    {
        $kategoriList = [
            'Pemeriksaan',
            'Tindakan Medis',
            'Laboratorium',
            'Rawat Jalan',
            'Lainnya',
        ];

        $role = Auth::user()->role;

        if ($role === 'super_admin') {
            return view(
                'dashboard.superadmin.layanan.edit',
                compact('layanan', 'kategoriList')
            );
        }

        if ($role === 'manajer') {
            return view(
                'dashboard.manajer.layanan.edit',
                compact('layanan', 'kategoriList')
            );
        }

        abort(403);
    }


    public function update(Request $request, Layanan $layanan)
    {
        $request->validate([
            'kategori' => 'required|string',
            'nama_layanan' => 'required|string|max:255',
            'tarif' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
        ]);

        $layanan->update($request->all());

        $role = Auth::user()->role;

        if ($role === 'super_admin') {
            return redirect()
                ->route('dashboard.superadmin.layanan.index')
                ->with('success', 'Layanan berhasil diperbarui');
        }

        if ($role === 'manajer') {
            return redirect()
                ->route('dashboard.manajer.layanan.index')
                ->with('success', 'Layanan berhasil diperbarui');
        }

        abort(403);
    }


    public function destroy(Layanan $layanan)
    {
        $layanan->delete();

        return redirect()->back()->with('success', 'Layanan berhasil dihapus');
    }
}
