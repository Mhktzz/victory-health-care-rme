@extends('layouts.dashboard')

@section('title', 'Antrean Pemeriksaan Awal')
@section('page-title', 'Antrean Pemeriksaan Awal')

@section('content')

    {{-- HEADER HALAMAN --}}
    <div class="mb-6">
        <h2 class="text-xl font-bold text-gray-800">Antrean Pemeriksaan Awal</h2>
        <p class="text-sm text-gray-500">Daftar pasien yang menunggu pemeriksaan awal</p>
    </div>

    {{-- KONTEN UTAMA --}}
    <div class="p-6 bg-white border border-gray-100 shadow-sm rounded-xl">

        {{-- FILTER DAN PENCARIAN --}}
        <div class="flex flex-col items-center justify-between mb-6 space-y-4 md:flex-row md:space-y-0">
            <div class="relative w-full md:w-80">
                <input type="text" placeholder="Cari pasien..."
                    class="w-full py-2 pl-10 pr-4 text-sm border border-gray-300 rounded-lg focus:ring-teal-500 focus:border-teal-500">
                <i class="absolute text-gray-400 transform -translate-y-1/2 fas fa-search left-3 top-1/2"></i>
            </div>

            <select
                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg md:w-44 focus:ring-teal-500 focus:border-teal-500">
                <option value="">Semua Status</option>
                <option value="belum">Belum Diperiksa</option>
                <option value="sudah">Sudah Diperiksa</option>
            </select>
        </div>

        {{-- TABEL ANTRIAN --}}
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm divide-y divide-gray-200">
                <thead>
                    <tr class="font-semibold text-left text-gray-500 bg-gray-50">
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

                    @forelse($reservations as $index => $r)
                        <tr>
                            <td class="px-4 py-4">
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 font-bold text-teal-700 rounded-lg bg-teal-50">
                                    #{{ $index + 1 }}
                                </span>
                            </td>

                            <td class="px-4 py-4">
                                <div class="font-bold text-gray-800">
                                    {{ $r->patient->nama ?? '-' }}
                                </div>
                                <div class="text-xs text-gray-500">
                                    {{ $r->patient->telepon ?? '-' }}
                                </div>
                            </td>

                            <td class="px-4 py-4 text-gray-600">
                                {{ $r->patient->nik ?? '-' }}
                            </td>

                            <td class="px-4 py-4 text-gray-600">
                                {{ $r->patient->umur ?? '-' }} th /
                                {{ $r->patient->jenis_kelamin ?? '-' }}
                            </td>

                            <td class="px-4 py-4 text-gray-600">
                                {{ $r->keluhan }}
                            </td>

                            <td class="px-4 py-4 font-medium text-gray-600">
                                {{ \Carbon\Carbon::parse($r->jam)->format('H:i') }}
                            </td>

                            <td class="px-4 py-4 italic text-gray-600">
                                {{ $r->dokter }}
                            </td>

                            <td class="px-4 py-4">
                                @if ($r->status == 'menunggu')
                                    <span
                                        class="px-2 py-1 text-[11px] font-bold rounded bg-yellow-100 text-yellow-700 uppercase">
                                        Belum Diperiksa
                                    </span>
                                @else
                                    <span
                                        class="px-2 py-1 text-[11px] font-bold rounded bg-green-100 text-green-700 uppercase">
                                        Sudah Diperiksa
                                    </span>
                                @endif
                            </td>

                            <td class="px-4 py-4 text-center">
                                <a href="{{ route('dashboard.perawat.periksa', $r->id) }}"
                                    class="p-2 text-white bg-teal-600 rounded shadow-sm hover:bg-teal-700">
                                    <i class="text-xs fas fa-eye"></i> Periksa
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="p-6 text-center text-gray-500">
                                Tidak ada data
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>

@endsection
