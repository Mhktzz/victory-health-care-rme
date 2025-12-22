@extends('layouts.app')

@section('title', 'Manajemen Pasien')
@section('page-title', 'Manajemen Pasien')

@section('content')

<div class="bg-white rounded-xl shadow p-6">

    {{-- HEADER --}}
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-lg font-semibold">Data Pasien</h2>

        {{-- Search --}}
        <input type="text"
               placeholder="Cari nama / NIK..."
               class="px-4 py-2 border rounded-lg focus:outline-none focus:ring w-64">
    </div>

    {{-- TABLE --}}
    <div class="overflow-x-auto">
        <table class="w-full border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold">NIK</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">No. RM</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Nama</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Umur</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Jenis Kelamin</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Telepon</th>
                    <th class="px-4 py-3 text-center text-sm font-semibold">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                {{-- CONTOH DATA (NANTI GANTI LOOP DATABASE) --}}
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3">3276010101010001</td>
                    <td class="px-4 py-3">RM-0001</td>
                    <td class="px-4 py-3">Andi Pratama</td>
                    <td class="px-4 py-3">25</td>
                    <td class="px-4 py-3">Laki-laki</td>
                    <td class="px-4 py-3">081234567890</td>
                    <td class="px-4 py-3 text-center space-x-2">
                        <a href="#"
                           class="inline-flex items-center px-3 py-1 text-sm bg-blue-500 text-white rounded hover:bg-blue-600">
                            <i class="fas fa-eye mr-1"></i> View
                        </a>

                        <a href="#"
                           class="inline-flex items-center px-3 py-1 text-sm bg-yellow-500 text-white rounded hover:bg-yellow-600">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>
                    </td>
                </tr>

                {{-- DATA KOSONG --}}
                {{--
                <tr>
                    <td colspan="7" class="px-4 py-6 text-center text-gray-500">
                        Data pasien belum tersedia
                    </td>
                </tr>
                --}}
            </tbody>
        </table>
    </div>

</div>

@endsection
