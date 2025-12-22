@extends('layouts.dashboard')

@section('title', 'Status Kunjungan')
@section('page-title', 'Status Kunjungan')

@section('content')

{{-- HEADER --}}
<div class="mb-6">
    <h2 class="text-xl font-semibold">Status Kunjungan</h2>
    <p class="text-gray-500">Monitor status kunjungan pasien hari ini</p>
</div>

{{-- SUMMARY CARD --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

    {{-- MENUNGGU --}}
    <div class="bg-white p-5 rounded-xl shadow flex items-center gap-4">
        <div class="bg-yellow-400 text-white p-3 rounded-lg">
            <i class="fas fa-clock"></i>
        </div>
        <div>
            <p class="text-sm text-gray-500">Pasien Menunggu</p>
            <h3 class="text-2xl font-bold">{{ $menunggu->count() }}</h3>
        </div>
    </div>

    {{-- DIPROSES --}}
    <div class="bg-white p-5 rounded-xl shadow flex items-center gap-4">
        <div class="bg-blue-500 text-white p-3 rounded-lg">
            <i class="fas fa-heartbeat"></i>
        </div>
        <div>
            <p class="text-sm text-gray-500">Sedang Diperiksa</p>
            <h3 class="text-2xl font-bold">{{ $diproses->count() }}</h3>
        </div>
    </div>

    {{-- SELESAI --}}
    <div class="bg-white p-5 rounded-xl shadow flex items-center gap-4">
        <div class="bg-green-500 text-white p-3 rounded-lg">
            <i class="fas fa-check-circle"></i>
        </div>
        <div>
            <p class="text-sm text-gray-500">Selesai Diperiksa</p>
            <h3 class="text-2xl font-bold">{{ $selesai->count() }}</h3>
        </div>
    </div>
</div>

{{-- LIST KUNJUNGAN --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    {{-- MENUNGGU --}}
    <div class="bg-yellow-50 p-4 rounded-xl">
        <h3 class="font-semibold mb-3 text-yellow-700">
            ⏳ Pasien Menunggu ({{ $menunggu->count() }})
        </h3>

        @foreach ($menunggu as $item)
        <div class="bg-white p-4 rounded-lg shadow mb-3">
            <span class="text-xs bg-yellow-100 text-yellow-700 px-2 py-1 rounded">
                Antrian #{{ $loop->iteration }}
            </span>
            <p class="font-semibold mt-2">{{ $item->patient->nama }}</p>
            <p class="text-sm text-gray-500">{{ $item->dokter }}</p>
            <p class="text-sm text-gray-400">{{ $item->poli }}</p>
            <p class="text-sm text-right text-gray-500">{{ $item->jam }}</p>
        </div>
        @endforeach
    </div>

    {{-- DIPROSES --}}
    <div class="bg-blue-50 p-4 rounded-xl">
        <h3 class="font-semibold mb-3 text-blue-700">
            💙 Sedang Diperiksa ({{ $diproses->count() }})
        </h3>

        @foreach ($diproses as $item)
        <div class="bg-white p-4 rounded-lg shadow mb-3 border border-blue-200">
            <span class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded">
                Antrian #{{ $loop->iteration }}
            </span>
            <p class="font-semibold mt-2">{{ $item->patient->nama }}</p>
            <p class="text-sm text-gray-500">{{ $item->dokter }}</p>
            <p class="text-sm text-gray-400">{{ $item->poli }}</p>
            <p class="text-sm text-right text-gray-500">{{ $item->jam }}</p>
        </div>
        @endforeach
    </div>

    {{-- SELESAI --}}
    <div class="bg-green-50 p-4 rounded-xl">
        <h3 class="font-semibold mb-3 text-green-700">
            ✅ Selesai Diperiksa ({{ $selesai->count() }})
        </h3>

        @foreach ($selesai as $item)
        <div class="bg-white p-4 rounded-lg shadow mb-3 border border-green-200">
            <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded">
                Antrian #{{ $loop->iteration }}
            </span>
            <p class="font-semibold mt-2">{{ $item->patient->nama }}</p>
            <p class="text-sm text-gray-500">{{ $item->dokter }}</p>
            <p class="text-sm text-gray-400">{{ $item->poli }}</p>
            <p class="text-sm text-right text-gray-500">{{ $item->jam }}</p>
        </div>
        @endforeach
    </div>

</div>

@endsection
