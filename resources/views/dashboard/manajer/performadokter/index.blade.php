@extends('layouts.dashboard')

@section('title', 'Master Data Medis')
@section('page-title', 'Master Data Medis')

@section('content')

    <div class="space-y-6">


        <h2 class="text-2xl font-bold text-gray-800">Performa Dokter</h2>
        <hr>

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">


            <div class="flex items-center gap-2 text-sm text-gray-600">
                <span>Show</span>

                <select class="px-3 py-2 text-sm border rounded-lg focus:ring focus:ring-teal-200 focus:outline-none">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>

                <span>entries</span>
            </div>


            <div class="flex flex-col gap-3 sm:flex-row sm:items-center">


                <div class="relative w-full sm:w-64">
                    <input type="text" placeholder="Cari data..."
                        class="w-full py-2 pl-10 pr-4 text-sm border rounded-lg focus:ring focus:ring-teal-200 focus:outline-none">
                    <i class="absolute text-gray-400 -translate-y-1/2 fas fa-search left-3 top-1/2"></i>
                </div>


                <div class="relative w-full sm:w-48">
                    <select
                        class="w-full px-4 py-2 text-sm border rounded-lg focus:ring focus:ring-teal-200 focus:outline-none">
                        <option value="">Semua Spesialisasi</option>
                        <option value="L">Dokter Umum</option>
                        <option value="P">Dokter Gigi</option>
                    </select>
                </div>

            </div>

        </div>




        <div class="mt-10 bg-white shadow rounded-xl">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left">Nama Dokter</th>
                            <th class="px-6 py-3 text-left">Spesialisasi</th>
                            <th class="px-6 py-3 text-center">Pasien Hari Ini</th>
                            <th class="px-6 py-3 text-center">Total Pasien Bulan Ini</th>
                            <th class="px-6 py-3 text-left">Diagnosis Terbanyak</th>
                            <th class="px-6 py-3 text-center">Rata-rata Waktu Layanan</th>
                            <th class="px-6 py-3 text-center">Status</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @php
                            $dokters = [
                                [
                                    'nama' => 'dr. Andi Pratama',
                                    'spesialis' => 'Umum',
                                    'hari_ini' => 12,
                                    'bulan_ini' => 210,
                                    'diagnosis' => 'ISPA',
                                    'waktu' => '15 menit',
                                    'status' => 'Aktif',
                                ],
                                [
                                    'nama' => 'dr. Siti Rahma',
                                    'spesialis' => 'Gigi',
                                    'hari_ini' => 8,
                                    'bulan_ini' => 145,
                                    'diagnosis' => 'Karies Gigi',
                                    'waktu' => '20 menit',
                                    'status' => 'Aktif',
                                ],
                                [
                                    'nama' => 'dr. Budi Santoso',
                                    'spesialis' => 'Penyakit Dalam',
                                    'hari_ini' => 0,
                                    'bulan_ini' => 98,
                                    'diagnosis' => 'Hipertensi',
                                    'waktu' => '25 menit',
                                    'status' => 'Tidak Aktif',
                                ],
                            ];
                        @endphp

                        @foreach ($dokters as $dokter)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium">
                                    {{ $dokter['nama'] }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $dokter['spesialis'] }}
                                </td>

                                <td class="px-6 py-4 font-semibold text-center">
                                    {{ $dokter['hari_ini'] }}
                                </td>

                                <td class="px-6 py-4 text-center">
                                    {{ $dokter['bulan_ini'] }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $dokter['diagnosis'] }}
                                </td>

                                <td class="px-6 py-4 text-center">
                                    {{ $dokter['waktu'] }}
                                </td>

                                <td class="px-6 py-4 text-center">
                                    @if ($dokter['status'] === 'Aktif')
                                        <span
                                            class="px-3 py-1 text-xs font-medium text-green-700 bg-green-100 rounded-full">
                                            Aktif
                                        </span>
                                    @else
                                        <span class="px-3 py-1 text-xs font-medium text-red-700 bg-red-100 rounded-full">
                                            Tidak Aktif
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 space-x-2 text-center">
                                    <button class="p-2 text-white rounded-lg bg-cyan-500 hover:bg-cyan-600" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>



    </div>

@endsection
