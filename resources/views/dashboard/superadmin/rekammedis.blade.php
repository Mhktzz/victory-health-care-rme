@extends('layouts.dashboard')

@section('title', 'Kelola Rekam Medis')
@section('page-title', 'Rekam Medis')

@section('content')

    {{-- HEADER HALAMAN --}}
    <h1 class="text-xl font-semibold text-gray-800">Rekam Medis</h1>
    <p class="mt-1 text-sm text-gray-600">
        Akses dan kelola seluruh rekam medis pasien
    </p>

    {{-- SUMMARY CARDS --}}
    <div class="grid grid-cols-1 gap-6 mt-6 md:grid-cols-3">

        {{-- Total --}}
        <div class="flex items-center justify-between p-5 bg-white border-l-4 shadow-md rounded-xl border-cyan-500">
            <div>
                <p class="text-sm font-medium text-gray-500">Total Rekam Medis</p>
                <h2 class="mt-1 text-3xl font-bold text-cyan-600">4</h2>
            </div>
            <div class="p-3 bg-cyan-100 rounded-xl text-cyan-500">
                <i class="text-xl fas fa-folder"></i>
            </div>
        </div>

        {{-- Lengkap --}}
        <div class="flex items-center justify-between p-5 bg-white border-l-4 border-green-500 shadow-md rounded-xl">
            <div>
                <p class="text-sm font-medium text-gray-500">Rekam Medis Lengkap</p>
                <h2 class="mt-1 text-3xl font-bold text-green-600">3</h2>
            </div>
            <div class="p-3 text-green-500 bg-green-100 rounded-xl">
                <i class="text-xl fas fa-check-circle"></i>
            </div>
        </div>

        {{-- Belum Lengkap --}}
        <div class="flex items-center justify-between p-5 bg-white border-l-4 border-red-500 shadow-md rounded-xl">
            <div>
                <p class="text-sm font-medium text-gray-500">Perlu Dilengkapi</p>
                <h2 class="mt-1 text-3xl font-bold text-red-600">1</h2>
            </div>
            <div class="p-3 text-red-500 bg-red-100 rounded-xl">
                <i class="text-xl fas fa-file-alt"></i>
            </div>
        </div>
    </div>

    {{-- TABLE --}}
    <div class="p-6 mt-8 bg-white shadow-md rounded-xl">

        {{-- SEARCH & FILTER --}}
        <div class="flex flex-col items-center justify-between gap-4 mb-6 md:flex-row">

            <div class="flex items-center space-x-2">
                <label class="text-sm text-gray-600">Show</label>
                <select class="p-2 text-sm border rounded-lg">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                </select>
                <span class="text-sm text-gray-600">entries</span>
            </div>

            <div class="flex flex-wrap gap-3">
                <input type="text" placeholder="Cari pasien / NIK" class="px-4 py-2 text-sm border rounded-lg">

                <select class="px-4 py-2 text-sm border rounded-lg">
                    <option>Semua Status</option>
                    <option>Lengkap</option>
                    <option>Belum Lengkap</option>
                </select>
            </div>
        </div>

        {{-- DATA TABLE --}}
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">No. RM</th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Nama Pasien</th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">NIK</th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Dokter</th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Tanggal</th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-xs font-medium text-center text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium">RM-2024-001</td>
                        <td class="px-6 py-4 text-sm">Agus Prasetyo</td>
                        <td class="px-6 py-4 text-sm">3301012345670001</td>
                        <td class="px-6 py-4 text-sm">Dr. Budi</td>
                        <td class="px-6 py-4 text-sm">8 Des 2024</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs text-green-800 bg-green-100 rounded-full">
                                Lengkap
                            </span>
                        </td>
                        <td class="px-6 py-4 space-x-2 text-center">
                            <button class="text-cyan-600"><i class="fas fa-eye"></i></button>
                            <button class="text-orange-500"><i class="fas fa-pen"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

@endsection
