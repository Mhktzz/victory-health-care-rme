@extends('layouts.dashboard')

@section('title', 'Dashboard Dokter')
@section('page-title', 'Dashboard Dokter')

@section('content')

    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Dashboard Dokter</h1>
        <p class="text-sm text-gray-500">Ringkasan antrian dan aktivitas</p>
    </div>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
        <div class="p-6 bg-white rounded-lg shadow">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm text-gray-500">Diperiksa Hari Ini</p>
                    <h2 class="text-3xl font-bold text-gray-800">{{ $patientsToday }}</h2>
                    <p class="mt-2 text-sm text-green-600">+2 Pasien Baru</p>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-amber-100 text-amber-700">
                        <i class="fas fa-user-check"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-6 bg-white rounded-lg shadow">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Pasien</p>
                    <h2 class="text-3xl font-bold text-gray-800">{{ number_format($totalPatients) }}</h2>
                    <div class="flex items-center mt-2 text-sm text-gray-500">
                        <span class="mr-2">+2.5k this week</span>
                        <span class="ml-2 text-green-600">↗ +10%</span>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-12 h-12 text-teal-700 bg-teal-100 rounded-lg">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8">
        <h3 class="text-lg font-semibold text-gray-800">History Pasien yang Sudah Ditangani</h3>
        <p class="mb-4 text-sm text-gray-500">Riwayat pasien yang telah selesai diperiksa</p>

        <div class="bg-white rounded-lg shadow">
            <div class="flex items-center justify-between p-4 border-b">
                <div class="flex items-center space-x-3">
                    <label class="text-sm text-gray-600">Show</label>
                    <select class="px-3 py-1 text-sm border rounded form-select">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                    </select>
                    <span class="text-sm text-gray-600">entries</span>
                </div>

                <div class="flex items-center space-x-3">
                    <div class="relative">
                        <input type="text" placeholder="Cari pasien..."
                            class="w-64 px-4 py-2 pl-10 text-sm border rounded-full" />
                        <div class="absolute text-gray-400 left-3 top-2"><i class="fas fa-search"></i></div>
                    </div>
                    <button class="px-4 py-2 text-sm text-gray-600 bg-white border rounded-full">Semua Jenis
                        Kelamin</button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="text-gray-600 bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left">NO. ANTRIAN</th>
                            <th class="px-6 py-3 text-left">NAMA PASIEN</th>
                            <th class="px-6 py-3 text-left">USIA</th>
                            <th class="px-6 py-3 text-left">JENIS KELAMIN</th>
                            <th class="px-6 py-3 text-left">KELUHAN</th>
                            <th class="px-6 py-3 text-left">WAKTU SELESAI</th>
                            <th class="px-6 py-3 text-left">STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $record)
                            <tr class="border-b">
                                <td class="px-6 py-4">
                                    <div
                                        class="flex items-center justify-center w-8 h-8 text-white bg-teal-600 rounded-full">
                                        {{ $loop->iteration }}</div>
                                </td>
                                <td class="px-6 py-4">{{ $record->patient->nama }}</td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($record->patient->tanggal_lahir)->age }}
                                    tahun</td>
                                <td class="px-6 py-4">
                                    {{ $record->patient->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td class="px-6 py-4">{{ Str::limit($record->keluhan_utama ?? '-', 60) }}</td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($record->updated_at)->format('H:i') }}</td>
                                <td class="px-6 py-4"><span
                                        class="px-3 py-1 text-xs text-green-700 bg-green-100 rounded-full">Selesai</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
