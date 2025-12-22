@extends('layouts.dashboard')

@section('title', 'Stok Obat')
@section('page-title', 'Stok Obat')

@section('content')

<div class="overflow-x-auto bg-white shadow rounded-xl">
    <table class="w-full text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left">Kode</th>
                <th class="px-6 py-3 text-left">Nama Obat</th>
                <th class="px-6 py-3 text-left">Jenis</th>
                <th class="px-6 py-3 text-left">Satuan</th>
                <th class="px-6 py-3 text-left">Stok</th>
                <th class="px-6 py-3 text-left">Kadaluarsa</th>
                <th class="px-6 py-3 text-left">Aksi</th>
            </tr>
        </thead>

        <tbody>
            <tr class="border-t">
                <td class="px-6 py-4">OBT-001</td>
                <td class="px-6 py-4">Paracetamol</td>
                <td class="px-6 py-4">Tablet</td>
                <td class="px-6 py-4">Strip</td>
                <td class="px-6 py-4">120</td>
                <td class="px-6 py-4">12 / 2026</td>
                <td class="px-6 py-4 space-x-2">
                    <button class="text-blue-600">Edit</button>
                    <button class="text-red-600">Hapus</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
