@extends('layouts.dashboard')

@section('title', 'Detail Reservasi')
@section('page-title', 'Detail Reservasi')

@section('content')

<div class="max-w-4xl mx-auto">

    {{-- HEADER --}}
    <div class="bg-white rounded-xl shadow p-6 mb-6 flex justify-between items-center">
        <div>
            <h2 class="text-xl font-semibold text-gray-800">
                Detail Reservasi Pasien
            </h2>
            <p class="text-sm text-gray-500">
                Informasi lengkap reservasi
            </p>
        </div>

        <a href="{{ route('dashboard.pendaftaran.reservasi.index') }}"
           class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">
            ← Kembali
        </a>
    </div>

    {{-- DETAIL CARD --}}
    <div class="bg-white rounded-xl shadow p-6">

        <div class="grid grid-cols-2 gap-6 text-sm">

            <div>
                <p class="text-gray-500">Pasien</p>
                <p class="font-semibold text-gray-800">
                    {{ $reservasi->pasien_identitas }}
                </p>
            </div>

            <div>
                <p class="text-gray-500">Jenis Layanan</p>
                <p class="font-semibold text-gray-800">
                    {{ $reservasi->jenis_layanan }}
                </p>
            </div>

            <div>
                <p class="text-gray-500">Dokter</p>
                <p class="font-semibold text-gray-800">
                    {{ $reservasi->dokter }}
                </p>
            </div>

            <div>
                <p class="text-gray-500">Tanggal</p>
                <p class="font-semibold text-gray-800">
                    {{ \Carbon\Carbon::parse($reservasi->tanggal)->format('d M Y') }}
                </p>
            </div>

            <div>
                <p class="text-gray-500">Jam</p>
                <p class="font-semibold text-gray-800">
                    {{ $reservasi->jam }}
                </p>
            </div>

            <div>
                <p class="text-gray-500">Status</p>
                <span class="inline-block px-3 py-1 text-xs rounded-full
                    {{ $reservasi->status === 'selesai' ? 'bg-green-100 text-green-700' :
                       ($reservasi->status === 'menunggu' ? 'bg-yellow-100 text-yellow-700' :
                       'bg-red-100 text-red-700') }}">
                    {{ ucfirst($reservasi->status) }}
                </span>
            </div>

            <div class="col-span-2">
                <p class="text-gray-500">Keluhan</p>
                <p class="font-semibold text-gray-800">
                    {{ $reservasi->keluhan ?? '-' }}
                </p>
            </div>

        </div>

        
    </div>
</div>

@endsection
