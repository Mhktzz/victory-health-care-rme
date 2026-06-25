@extends('layouts.dashboard')

@section('title', 'Dashboard Perawat')
@section('page-title', 'Dashboard')

@section('content')

    {{-- HEADER --}}
    <div class="mb-6">
        <h2 class="text-xl font-bold text-gray-800">Dashboard Perawat</h2>
        <p class="text-sm text-gray-500">Pantau antrian dan status pemeriksaan awal pasien</p>
    </div>

    @php
        $total = $reservations->count();
        $menunggu = $reservations->where('status', 'menunggu')->count();
        $selesai = $reservations->where('status', 'selesai')->count();
    @endphp

    {{-- KARTU STATISTIK --}}
    <div class="grid grid-cols-1 gap-6 mb-8 sm:grid-cols-2 lg:grid-cols-3">

        {{-- TOTAL --}}
        <div class="p-5 bg-white border border-gray-100 shadow-sm rounded-xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Antrian Hari Ini</p>
                    <h2 class="text-3xl font-bold text-[#519D9E]">{{ $total }}</h2>
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

        {{-- MENUNGGU --}}
        <div class="p-5 bg-white border border-gray-100 shadow-sm rounded-xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Menunggu Periksa</p>
                    <h2 class="text-3xl font-bold text-orange-500">{{ $menunggu }}</h2>
                </div>
                <div class="p-3 text-orange-500 rounded-lg bg-orange-50">
                    <i class="text-xl fas fa-clock"></i>
                </div>
            </div>
            <hr class="my-3 border-gray-50">
            <div class="flex items-center text-xs font-semibold text-orange-600">
                <i class="mr-1 fas fa-exclamation-circle"></i> Butuh tindakan awal segera
            </div>
        </div>

        {{-- SELESAI --}}
        <div class="p-5 bg-white border border-gray-100 shadow-sm rounded-xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Sudah Diperiksa</p>
                    <h2 class="text-3xl font-bold text-green-600">{{ $selesai }}</h2>
                </div>
                <div class="p-3 text-green-600 rounded-lg bg-green-50">
                    <i class="text-xl fas fa-check-circle"></i>
                </div>
            </div>
            <hr class="my-3 border-gray-50">
            <div class="flex items-center text-xs font-semibold text-green-600">
                <i class="mr-1 fas fa-user-md"></i> Siap dilanjutkan oleh Dokter
            </div>
        </div>
    </div>

    {{-- LIST ANTRIAN --}}
    <div class="p-6 bg-white border border-gray-100 shadow-sm rounded-xl">
        <h3 class="mb-6 text-lg font-bold text-gray-800">Antrian Pasien Hari Ini</h3>

        <div class="space-y-4">

            @forelse($reservations as $r)
                <div
                    class="flex items-center justify-between p-4 transition border border-gray-100 rounded-xl hover:bg-gray-50">

                    <div class="flex items-center space-x-4">

                        {{-- NOMOR --}}
                        <div
                            class="flex items-center justify-center w-12 h-12 text-[#519D9E] bg-teal-50 rounded-lg font-bold">
                            #{{ $r->id }}
                        </div>

                        {{-- DATA PASIEN --}}
                        <div>
                            <h4 class="font-bold text-gray-800">
                                {{ $r->patient->nama ?? '-' }}
                            </h4>

                            <p class="text-xs text-gray-500">
                                {{ $r->patient->umur ?? '-' }} tahun • {{ $r->patient->jenis_kelamin ?? '-' }}
                            </p>

                            <p class="mt-1 text-sm text-gray-600">
                                <span class="font-medium">Keluhan:</span> {{ $r->keluhan }}
                            </p>

                            {{-- STATUS --}}
                            @if ($r->status == 'menunggu')
                                <span class="text-[10px] text-yellow-600 font-bold">Belum diperiksa</span>
                            @else
                                <span class="text-[10px] text-green-600 font-bold">Sudah diperiksa</span>
                            @endif
                        </div>
                    </div>

                    {{-- BUTTON --}}
                    <a href="{{ route('dashboard.perawat.periksa', $r->id) }}"
                        class="px-6 py-2 text-sm font-bold text-white bg-[#519D9E] rounded-lg hover:bg-teal-700 shadow-sm transition">
                        Periksa
                    </a>

                </div>

            @empty
                <div class="text-center text-gray-500">
                    Tidak ada antrian hari ini
                </div>
            @endforelse

        </div>
    </div>

@endsection
