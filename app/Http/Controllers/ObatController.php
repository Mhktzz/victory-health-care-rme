<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ObatController extends Controller
{
    public function index(Request $request)
    {
        // ================== DATA TABLE ==================
        $obats = Obat::query()
            ->when($request->search, function ($q) use ($request) {
                $q->where('nama_obat', 'like', '%' . $request->search . '%')
                  ->orWhere('kode_obat', 'like', '%' . $request->search . '%');
            })
            ->when($request->jenis, function ($q) use ($request) {
                $q->where('jenis', $request->jenis);
            })
            ->orderBy('nama_obat')
            ->paginate(10);

        // ================== ALERT ==================
        $stokMenipis = Obat::whereColumn(
            'stok_tersedia',
            '<=',
            'stok_minimum'
        )->count();

        $obatKadaluarsa = Obat::whereDate(
            'tanggal_kadaluarsa',
            '<=',
            Carbon::now()->addDays(60)
        )->count();

        return view('dashboard.apoteker.stok_obat', compact(
            'obats',
            'stokMenipis',
            'obatKadaluarsa'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_obat' => 'required|unique:obats,kode_obat',
            'nama_obat' => 'required',
            'jenis' => 'required',
            'satuan' => 'required',
            'stok_tersedia' => 'required|integer|min:0',
            'stok_minimum' => 'required|integer|min:0',
            'tanggal_kadaluarsa' => 'required|date',
        ]);

        Obat::create($request->all());

        return back()->with('success', 'Obat berhasil ditambahkan');
    }

    public function update(Request $request, Obat $obat)
    {
        $request->validate([
            'kode_obat' => 'required|unique:obats,kode_obat,' . $obat->id,
            'nama_obat' => 'required',
            'jenis' => 'required',
            'satuan' => 'required',
            'stok_tersedia' => 'required|integer|min:0',
            'stok_minimum' => 'required|integer|min:0',
            'tanggal_kadaluarsa' => 'required|date',
        ]);

        $obat->update($request->all());

        return back()->with('success', 'Obat berhasil diperbarui');
    }

    public function destroy(Obat $obat)
    {
        $obat->delete();

        return back()->with('success', 'Obat berhasil dihapus');
    }
}
