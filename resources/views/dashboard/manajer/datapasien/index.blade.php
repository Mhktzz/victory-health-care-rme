@extends('layouts.dashboard')

@section('title', 'Master Data Medis')
@section('page-title', 'Master Data Medis')

@section('content')

    <div class="space-y-6">


        <h2 class="text-2xl font-bold text-gray-800">Data Pasien Terdaftar</h2>
        <hr>

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            {{-- LEFT : SHOW PER PAGE --}}
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

            {{-- RIGHT : SEARCH & FILTER --}}
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center">

                {{-- SEARCH --}}
                <div class="relative w-full sm:w-64">
                    <input type="text" placeholder="Cari data..."
                        class="w-full py-2 pl-10 pr-4 text-sm border rounded-lg focus:ring focus:ring-teal-200 focus:outline-none">
                    <i class="absolute text-gray-400 -translate-y-1/2 fas fa-search left-3 top-1/2"></i>
                </div>

                {{-- FILTER JENIS KELAMIN --}}
                <div class="relative w-full sm:w-48">
                    <select
                        class="w-full px-4 py-2 text-sm border rounded-lg focus:ring focus:ring-teal-200 focus:outline-none">
                        <option value="">Semua Jenis Kelamin</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

            </div>

        </div>



        {{-- TABLE DATA PASIEN --}}
        <div class="mt-10 bg-white shadow rounded-xl">


            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left">No. RM</th>
                            <th class="px-6 py-3 text-left">Nama</th>
                            <th class="px-6 py-3 text-left">Tanggal Lahir</th>
                            <th class="px-6 py-3 text-left">Jenis Kelamin</th>
                            <th class="px-6 py-3 text-left">Telepon</th>
                            <th class="px-6 py-3 text-left">Tgl Daftar</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($patients as $patient)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $patient->no_rm }}</td>
                                <td class="px-6 py-4">{{ $patient->nama }}</td>
                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($patient->tanggal_lahir)->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $patient->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}
                                </td>
                                <td class="px-6 py-4">{{ $patient->telepon }}</td>
                                <td class="px-6 py-4">
                                    {{ $patient->created_at->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="{{ route('dashboard.manajer.datapasien.show', $patient->id) }}"
                                        class="inline-flex items-center px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full hover:bg-blue-200">
                                        <i class="mr-1 fas fa-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-6 text-center text-gray-500">
                                    Data pasien belum tersedia
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>


    </div>

@endsection
