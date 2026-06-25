<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Berhasil mengambil data',
            'data' => Layanan::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_layanan' => 'required|string|max:50',
            'kategori' => 'required|string',
            'nama_layanan' => 'required|string|max:255',
            'tarif' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
        ]);

        $layanan = Layanan::create($data);

        return response()->json([
            'message' => 'Berhasil ditambahkan',
            'data' => $layanan
        ], 201);
    }

    public function show(Layanan $layanan)
    {
        return response()->json([
            'message' => 'Detail layanan',
            'data' => $layanan
        ]);
    }

    public function update(Request $request, Layanan $layanan)
    {
        $data = $request->validate([
            'kategori' => 'required|string',
            'nama_layanan' => 'required|string|max:255',
            'tarif' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
        ]);

        $layanan->update($data);

        return response()->json([
            'message' => 'Berhasil diupdate',
            'data' => $layanan
        ]);
    }

    public function destroy(Layanan $layanan)
    {
        $layanan->delete();

        return response()->json([
            'message' => 'Berhasil dihapus'
        ]);
    }
}
