@extends('layouts.dashboard')

@section('title', 'Rekam Medis')
@section('page-title', 'Rekam Medis')

@section('content')

    {{-- CARD UTAMA REKAM MEDIS --}}

    <div class="p-6 bg-white shadow-md rounded-xl">

        {{-- HEADER --}}
        <div class="pb-4 mb-4 border-b">
            <h2 class="text-2xl font-bold text-gray-800">Rekam Medis</h2>
            <p class="text-sm text-gray-500">Akses dan kelola seluruh rekam medis pasien</p>
        </div>

        {{-- STATS CARDS REKAM MEDIS --}}
        <div class="grid grid-cols-1 gap-4 mb-6 sm:grid-cols-3">

            <div class="flex items-center p-4 space-x-4 bg-gray-100 border-l-4 rounded-lg shadow-sm border-cyan-500">
                <i class="text-2xl fas fa-file-invoice text-cyan-600"></i>
                <div>
                    <p class="text-xs text-gray-500">Total Rekam Medis</p>
                    <h3 class="text-xl font-bold text-gray-800">4</h3>
                </div>
            </div>

            <div class="flex items-center p-4 space-x-4 border-l-4 border-green-500 rounded-lg shadow-sm bg-green-50">
                <i class="text-2xl text-green-600 fas fa-check-circle"></i>
                <div>
                    <p class="text-xs text-gray-500">Rekam Medis Lengkap</p>
                    <h3 class="text-xl font-bold text-green-800">3</h3>
                </div>
            </div>

            <div class="flex items-center p-4 space-x-4 border-l-4 border-red-500 rounded-lg shadow-sm bg-red-50">
                <i class="text-2xl text-red-600 fas fa-exclamation-triangle"></i>
                <div>
                    <p class="text-xs text-gray-500">Perlu Dilengkapi</p>
                    <h3 class="text-xl font-bold text-red-800">1</h3>
                </div>
            </div>
        </div>

        {{-- KONTROL TABEL --}}
        <div class="flex flex-col items-center justify-between gap-4 mb-4 md:flex-row">
            <div class="flex items-center space-x-2 text-sm text-gray-600">
                <span>Show</span>
                <select class="p-1 border border-gray-300 rounded-md">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                </select>
                <span>entries</span>
            </div>

            <div class="flex flex-col w-full gap-2 sm:flex-row md:w-auto">
                <input type="text" placeholder="Cari pasien / NIK"
                    class="w-full px-4 py-2 text-sm border rounded-md sm:w-64">
                <select class="px-4 py-2 text-sm border rounded-md">
                    <option>Semua Status</option>
                    <option>Lengkap</option>
                    <option>Belum Lengkap</option>
                </select>
            </div>
        </div>

        {{-- TABEL DATA --}}
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">No RM</th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Nama Pasien</th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">NIK</th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Dokter</th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Tanggal</th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 text-sm">RM-2024-001</td>
                        <td class="px-6 py-4 text-sm font-medium">Agus Prasetyo</td>
                        <td class="px-6 py-4 text-sm">3301012345670001</td>
                        <td class="px-6 py-4 text-sm">Dr. Budi Santoso</td>
                        <td class="px-6 py-4 text-sm">8 Des 2024</td>
                        <td class="px-6 py-4">
                            <span class="px-2 text-xs text-green-800 bg-green-100 rounded-full">Lengkap</span>
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <button class="text-cyan-600"><i class="fas fa-eye"></i></button>
                            <button class="ml-2 text-orange-600"><i class="fas fa-edit"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


    </div>

@endsection
