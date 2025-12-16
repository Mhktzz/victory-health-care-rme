@extends('layouts.dashboard')

@section('title', 'Dashboard Dokter')
@section('page-title', 'Dashboard Dokter')

@section('content')

    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Dashboard Dokter</h1>
        <p class="text-sm text-gray-500">Ringkasan antrian dan aktivitas</p>
    </div>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
        <div class="p-6 bg-white shadow rounded-lg">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm text-gray-500">Diperiksa Hari Ini</p>
                    <h2 class="text-3xl font-bold text-gray-800">{{ $patientsToday }}</h2>
                    <p class="text-sm text-green-600 mt-2">+2 Pasien Baru</p>
                </div>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center text-amber-700">
                        <i class="fas fa-user-check"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-6 bg-white shadow rounded-lg">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Pasien</p>
                    <h2 class="text-3xl font-bold text-gray-800">{{ number_format($totalPatients) }}</h2>
                    <div class="flex items-center text-sm text-gray-500 mt-2">
                        <span class="mr-2">+2.5k this week</span>
                        <span class="text-green-600 ml-2">↗ +10%</span>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center text-teal-700">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8">
        <h3 class="text-lg font-semibold text-gray-800">History Pasien yang Sudah Ditangani</h3>
        <p class="text-sm text-gray-500 mb-4">Riwayat pasien yang telah selesai diperiksa</p>

        <div class="bg-white shadow rounded-lg">
            <div class="flex items-center justify-between p-4 border-b">
                <div class="flex items-center space-x-3">
                    <label class="text-sm text-gray-600">Show</label>
                    <select class="form-select border rounded px-3 py-1 text-sm">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                    </select>
                    <span class="text-sm text-gray-600">entries</span>
                </div>

                <div class="flex items-center space-x-3">
                    <div class="relative">
                        <input type="text" placeholder="Cari pasien..." class="border rounded-full px-4 py-2 pl-10 text-sm w-64" />
                        <div class="absolute left-3 top-2 text-gray-400"><i class="fas fa-search"></i></div>
                    </div>
                    <button class="bg-white border rounded-full px-4 py-2 text-sm text-gray-600">Semua Jenis Kelamin</button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-100 text-gray-600">
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
                        @foreach($records as $record)
                            <tr class="border-b">
                                <td class="px-6 py-4">
                                    <div class="w-8 h-8 bg-teal-600 text-white rounded-full flex items-center justify-center">{{ $loop->iteration }}</div>
                                </td>
                                <td class="px-6 py-4">{{ $record->patient->nama }}</td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($record->patient->tanggal_lahir)->age }} tahun</td>
                                <td class="px-6 py-4">{{ $record->patient->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td class="px-6 py-4">{{ Str::limit($record->keluhan_utama ?? '-', 60) }}</td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($record->updated_at)->format('H:i') }}</td>
                                <td class="px-6 py-4"><span class="px-3 py-1 text-xs text-green-700 bg-green-100 rounded-full">Selesai</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
