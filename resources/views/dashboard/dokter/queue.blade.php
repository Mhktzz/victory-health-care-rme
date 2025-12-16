@extends('layouts.dashboard')

@section('title', 'Antrian Pasien')
@section('page-title', 'Antrian Pasien')

@section('content')

    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Antrian Pasien</h1>
        <p class="text-sm text-gray-500">Kelola antrian pasien yang menunggu pemeriksaan</p>
    </div>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
        <div class="p-6 bg-white shadow rounded-lg">
            <p class="text-sm text-gray-500">Menunggu</p>
            <h3 class="text-2xl font-bold">{{ $patients->count() }}</h3>
            <p class="text-sm text-gray-500 mt-2">Pasien dalam antrian</p>
        </div>
        <div class="p-6 bg-white shadow rounded-lg">
            <p class="text-sm text-gray-500">Sedang Diperiksa</p>
            <h3 class="text-2xl font-bold">0</h3>
            <p class="text-sm text-gray-500 mt-2">Tidak ada pasien</p>
        </div>
        <div class="p-6 bg-white shadow rounded-lg">
            <p class="text-sm text-gray-500">Selesai</p>
            <h3 class="text-2xl font-bold">20</h3>
            <p class="text-sm text-gray-500 mt-2">Pemeriksaan hari ini</p>
        </div>
    </div>

    <div class="mt-8 bg-white shadow rounded-lg">
        <div class="p-6 border-b">
            <h2 class="text-lg font-semibold">Antrian Menunggu</h2>
            <p class="text-sm text-gray-500">Daftar pasien yang menunggu untuk diperiksa</p>
        </div>

        <div class="p-6 space-y-4">
            @foreach($patients as $patient)
                <div class="border rounded-lg p-4 flex justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-teal-600 text-white rounded-lg flex items-center justify-center">{{ $patient->id }}</div>
                        <div>
                            <div class="font-semibold">{{ $patient->nama }}</div>
                            <div class="text-sm text-gray-500">
                                {{ \Carbon\Carbon::parse($patient->tanggal_lahir)->age }} tahun · {{ $patient->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }} ·
                                @php
                                    $latest = $patient->medicalRecords->first();
                                @endphp
                                {{ $latest ? \Carbon\Carbon::parse($latest->created_at)->format('H:i') : '-' }}
                            </div>
                            <div class="text-sm text-gray-600 mt-2">Keluhan: {{ $latest->keluhan_utama ?? 'Tidak ada keluhan tercatat' }}</div>
                        </div>
                    </div>

                    <div>
                        <form action="{{ route('dashboard.dokter.call', ['patient' => $patient->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-amber-500 text-white px-4 py-2 rounded-lg">Panggil Pasien</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
