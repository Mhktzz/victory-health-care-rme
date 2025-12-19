@extends('layouts.dashboard')

@section('title', 'Dashboard Perawat')
@section('page-title', 'Dashboard')

@section('content')

    {{-- HEADER DASHBOARD PERAWAT --}}
    <div class="mb-6">
        <h2 class="text-xl font-bold text-gray-800">Dashboard Perawat</h2>
        <p class="text-sm text-gray-500">Pantau antrian dan status pemeriksaan awal pasien</p>
    </div>

    {{-- KARTU STATISTIK --}}
    <div class="grid grid-cols-1 gap-6 mb-8 sm:grid-cols-2 lg:grid-cols-3">
        
        {{-- Antrian Hari Ini --}}
        <div class="p-5 bg-white shadow-sm border border-gray-100 rounded-xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Antrian Hari Ini</p>
                    <h2 class="text-3xl font-bold text-[#519D9E]">4</h2>
                </div>
                <div class="p-3 text-[#519D9E] bg-teal-50 rounded-lg">
                    <i class="text-xl fas fa-users"></i>
                </div>
            </div>
            <hr class="my-3 border-gray-50">
            <div class="flex items-center text-xs text-gray-400">
                <i class="mr-1 fas fa-calendar-alt"></i> Total pendaftaran hari ini
            </div>
        </div>

        {{-- Menunggu Pemeriksaan --}}
        <div class="p-5 bg-white shadow-sm border border-gray-100 rounded-xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Menunggu Periksa</p>
                    <h2 class="text-3xl font-bold text-orange-500">2</h2>
                </div>
                <div class="p-3 text-orange-500 bg-orange-50 rounded-lg">
                    <i class="text-xl fas fa-clock"></i>
                </div>
            </div>
            <hr class="my-3 border-gray-50">
            <div class="flex items-center text-xs text-orange-600 font-semibold">
                <i class="mr-1 fas fa-exclamation-circle"></i> Butuh tindakan awal segera
            </div>
        </div>

        {{-- Sudah Diperiksa --}}
        <div class="p-5 bg-white shadow-sm border border-gray-100 rounded-xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Sudah Diperiksa</p>
                    <h2 class="text-3xl font-bold text-green-600">2</h2>
                </div>
                <div class="p-3 text-green-600 bg-green-50 rounded-lg">
                    <i class="text-xl fas fa-check-circle"></i>
                </div>
            </div>
            <hr class="my-3 border-gray-50">
            <div class="flex items-center text-xs text-green-600 font-semibold">
                <i class="mr-1 fas fa-user-md"></i> Siap dilanjutkan oleh Dokter
            </div>
        </div>
    </div>

    {{-- DAFTAR ANTRIAN PASIEN --}}
    <div class="p-6 bg-white shadow-sm border border-gray-100 rounded-xl">
        <h3 class="text-lg font-bold text-gray-800 mb-6">Antrian Pasien Hari Ini</h3>

        <div class="space-y-4">
            {{-- Pasien 1: Joko Widodo --}}
            <div class="flex items-center justify-between p-4 border border-gray-100 rounded-xl hover:bg-gray-50 transition">
                <div class="flex items-center space-x-4">
                    <div class="flex items-center justify-center w-12 h-12 text-[#519D9E] bg-teal-50 rounded-lg font-bold">#21</div>
                    <div>
                        <h4 class="font-bold text-gray-800">Joko Widodo</h4>
                        <p class="text-xs text-gray-500">48 tahun • Laki-laki</p>
                        <p class="text-sm text-gray-600 mt-1"><span class="font-medium">Keluhan:</span> Batuk dan pilek</p>
                    </div>
                </div>
                {{-- Link ke Form Periksa Pasien #21 --}}
                <a href="{{ route('dashboard.perawat.periksa', 21) }}" 
                   class="px-6 py-2 text-sm font-bold text-white bg-[#519D9E] rounded-lg hover:bg-teal-700 shadow-sm transition">
                    Periksa
                </a>
            </div>

            {{-- Pasien 2: Sri Mulyani --}}
            <div class="flex items-center justify-between p-4 border border-gray-100 rounded-xl hover:bg-gray-50 transition">
                <div class="flex items-center space-x-4">
                    <div class="flex items-center justify-center w-12 h-12 text-[#519D9E] bg-teal-50 rounded-lg font-bold">#22</div>
                    <div>
                        <h4 class="font-bold text-gray-800">Sri Mulyani</h4>
                        <p class="text-xs text-gray-500">44 tahun • Perempuan</p>
                        <p class="text-sm text-gray-600 mt-1"><span class="font-medium">Keluhan:</span> Demam dan nyeri badan</p>
                    </div>
                </div>
                {{-- Link ke Form Periksa Pasien #22 --}}
                <a href="{{ route('dashboard.perawat.periksa', 22) }}" 
                   class="px-6 py-2 text-sm font-bold text-white bg-[#519D9E] rounded-lg hover:bg-teal-700 shadow-sm transition">
                    Periksa
                </a>
            </div>

            {{-- Pasien 3: Sudah Selesai --}}
            <div class="flex items-center justify-between p-4 border border-green-100 bg-green-50/20 rounded-xl">
                <div class="flex items-center space-x-4">
                    <div class="flex items-center justify-center w-12 h-12 text-green-700 bg-green-100 rounded-lg font-bold">#23</div>
                    <div>
                        <div class="flex items-center space-x-2">
                            <h4 class="font-bold text-gray-800">Anies Baswedan</h4>
                            <span class="px-2 py-0.5 text-[10px] font-bold text-green-700 bg-green-100 rounded-sm uppercase tracking-wider">Sudah Diperiksa</span>
                        </div>
                        <p class="text-xs text-gray-500">52 tahun • Laki-laki</p>
                        <p class="text-sm text-gray-600 mt-1">Keluhan: Sakit kepala</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection