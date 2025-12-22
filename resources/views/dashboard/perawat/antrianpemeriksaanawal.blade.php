@extends('layouts.dashboard')

@section('title', 'Antrian Pemeriksaan Awal')
@section('page-title', 'Antrian Pemeriksaan Awal')

@section('content')

    {{-- HEADER HALAMAN --}}
    <div class="mb-6">
        <h2 class="text-xl font-bold text-gray-800">Antrian Pemeriksaan Awal</h2>
        <p class="text-sm text-gray-500">Daftar pasien yang menunggu pemeriksaan awal</p>
    </div>

    {{-- KONTEN UTAMA --}}
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
        
        {{-- FILTER DAN PENCARIAN --}}
        <div class="flex flex-col md:flex-row justify-between items-center mb-6 space-y-4 md:space-y-0">
            <div class="relative w-full md:w-80">
                <input type="text" placeholder="Cari pasien..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-teal-500 focus:border-teal-500 text-sm">
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            </div>
            
            <select class="w-full md:w-44 border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-teal-500 focus:border-teal-500">
                <option value="">Semua Status</option>
                <option value="belum">Belum Diperiksa</option>
                <option value="sudah">Sudah Diperiksa</option>
            </select>
        </div>

        {{-- TABEL ANTRIAN --}}
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead>
                    <tr class="text-left text-gray-500 font-semibold bg-gray-50">
                        <th class="px-4 py-3">No. Antrian</th>
                        <th class="px-4 py-3">Nama Pasien</th>
                        <th class="px-4 py-3">NIK</th>
                        <th class="px-4 py-3">Umur/JK</th>
                        <th class="px-4 py-3">Keluhan</th>
                        <th class="px-4 py-3">Jam</th>
                        <th class="px-4 py-3">Dokter</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    
                    {{-- Baris Pasien 1 --}}
                    <tr>
                        <td class="px-4 py-4">
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-teal-50 text-teal-700 font-bold">#21</span>
                        </td>
                        <td class="px-4 py-4">
                            <div class="font-bold text-gray-800">Joko Widodo</div>
                            <div class="text-xs text-gray-500">081234567890</div>
                        </td>
                        <td class="px-4 py-4 text-gray-600">3301011975061001</td>
                        <td class="px-4 py-4 text-gray-600">48 th / L</td>
                        <td class="px-4 py-4 text-gray-600">Batuk dan pilek</td>
                        <td class="px-4 py-4 text-gray-600 font-medium">10:00</td>
                        <td class="px-4 py-4 text-gray-600 italic">Dr. Budi Santoso</td>
                        <td class="px-4 py-4">
                            <span class="px-2 py-1 text-[11px] font-bold rounded bg-yellow-100 text-yellow-700 uppercase">Belum Diperiksa</span>
                        </td>
                        <td class="px-4 py-4 text-center">
                            <button class="p-2 bg-teal-600 text-white rounded hover:bg-teal-700 shadow-sm" title="Lihat">
                                <i class="fas fa-eye text-xs"></i>
                            </button>
                        </td>
                    </tr>

                    {{-- Baris Pasien 2 --}}
                    <tr>
                        <td class="px-4 py-4">
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-teal-50 text-teal-700 font-bold">#22</span>
                        </td>
                        <td class="px-4 py-4">
                            <div class="font-bold text-gray-800">Sri Mulyani</div>
                            <div class="text-xs text-gray-500">081298765432</div>
                        </td>
                        <td class="px-4 py-4 text-gray-600">3301015678901234</td>
                        <td class="px-4 py-4 text-gray-600">44 th / P</td>
                        <td class="px-4 py-4 text-gray-600">Demam dan nyeri badan</td>
                        <td class="px-4 py-4 text-gray-600 font-medium">10:30</td>
                        <td class="px-4 py-4 text-gray-600 italic">Dr. Budi Santoso</td>
                        <td class="px-4 py-4">
                            <span class="px-2 py-1 text-[11px] font-bold rounded bg-yellow-100 text-yellow-700 uppercase">Belum Diperiksa</span>
                        </td>
                        <td class="px-4 py-4 text-center">
                            <button class="p-2 bg-teal-600 text-white rounded hover:bg-teal-700 shadow-sm">
                                <i class="fas fa-eye text-xs"></i>
                            </button>
                        </td>
                    </tr>

                    {{-- Baris Pasien 3 (Sudah Diperiksa) --}}
                    <tr>
                        <td class="px-4 py-4">
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-teal-50 text-teal-700 font-bold">#23</span>
                        </td>
                        <td class="px-4 py-4">
                            <div class="font-bold text-gray-800">Anies Baswedan</div>
                            <div class="text-xs text-gray-500">081234561111</div>
                        </td>
                        <td class="px-4 py-4 text-gray-600">3301016789012345</td>
                        <td class="px-4 py-4 text-gray-600">52 th / L</td>
                        <td class="px-4 py-4 text-gray-600">Sakit kepala</td>
                        <td class="px-4 py-4 text-gray-600 font-medium">11:00</td>
                        <td class="px-4 py-4 text-gray-600 italic">Dr. Budi Santoso</td>
                        <td class="px-4 py-4">
                            <span class="px-2 py-1 text-[11px] font-bold rounded bg-green-100 text-green-700 uppercase">Sudah Diperiksa</span>
                        </td>
                        <td class="px-4 py-4 text-center">
                            <button class="p-2 bg-teal-600 text-white rounded hover:bg-teal-700 shadow-sm">
                                <i class="fas fa-eye text-xs"></i>
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>

@endsection