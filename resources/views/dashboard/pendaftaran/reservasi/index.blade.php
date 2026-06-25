@extends('layouts.dashboard')

@section('title', 'Reservasi & Penjadwalan')
@section('page-title', 'Reservasi & Penjadwalan')

@section('content')

    <div class="mx-auto max-w-7xl">

        {{-- HEADER --}}
        <div
            class="flex flex-col gap-4 p-6 mb-6 bg-white border border-gray-200 shadow rounded-2xl md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">
                    Reservasi & Penjadwalan
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    Kelola data reservasi pasien dan jadwal pemeriksaan
                </p>
            </div>

            <a href="{{ route('dashboard.pendaftaran.reservasi.create') }}"
                class="px-5 py-3 font-medium text-white transition bg-blue-600 rounded-xl hover:bg-blue-700">
                + Buat Reservasi
            </a>
        </div>

        {{-- FILTER --}}
        <div class="p-6 mb-6 bg-white border border-gray-200 shadow rounded-2xl">
            <form method="GET" class="flex flex-col gap-4 md:flex-row md:items-end">

                <div class="w-full md:w-72">
                    <label class="block mb-2 text-sm font-medium text-gray-700">
                        Filter Tanggal
                    </label>

                    <input type="date" name="tanggal" value="{{ request('tanggal') ?? now()->format('Y-m-d') }}"
                        class="w-full px-4 py-2 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-200 focus:border-blue-600">
                </div>

                <div class="flex gap-3">
                    <button type="submit" class="px-5 py-2 text-white bg-gray-800 rounded-xl hover:bg-gray-900">
                        Terapkan
                    </button>

                    <a href="{{ route('dashboard.pendaftaran.reservasi.index') }}"
                        class="px-5 py-2 text-gray-700 bg-gray-200 rounded-xl hover:bg-gray-300">
                        Reset
                    </a>
                </div>

            </form>
        </div>

        {{-- LIST DATA --}}
        @if ($reservations->count())

            <div class="space-y-5">

                @foreach ($reservations as $r)
                    <div class="p-6 transition bg-white border border-gray-200 shadow rounded-2xl hover:shadow-md">

                        <div class="flex flex-col gap-6 xl:flex-row xl:items-center xl:justify-between">

                            {{-- LEFT --}}
                            <div class="flex-1">

                                {{-- NAMA + STATUS --}}
                                <div class="flex flex-wrap items-center gap-3 mb-3">

                                    <h3 class="text-lg font-semibold text-gray-800">
                                        {{ $r->patient->nama ?? '-' }}
                                    </h3>

                                    <span class="text-sm text-gray-500">
                                        RM: {{ $r->patient->no_rm ?? '-' }}
                                    </span>

                                    {{-- STATUS --}}
                                    <span
                                        class="px-3 py-1 text-xs font-semibold rounded-full
                                    {{ $r->status == 'menunggu' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                    {{ $r->status == 'diproses' ? 'bg-blue-100 text-blue-700' : '' }}
                                    {{ $r->status == 'selesai' ? 'bg-green-100 text-green-700' : '' }}
                                    {{ $r->status == 'dibatalkan' ? 'bg-red-100 text-red-700' : '' }}">
                                        {{ ucfirst($r->status) }}
                                    </span>

                                </div>

                                {{-- DETAIL --}}
                                <div class="grid grid-cols-1 gap-3 text-sm text-gray-600 md:grid-cols-2 xl:grid-cols-4">

                                    <div>
                                        <span class="font-medium text-gray-800">Tanggal:</span><br>
                                        {{ \Carbon\Carbon::parse($r->tanggal)->format('d M Y') }}
                                    </div>

                                    <div>
                                        <span class="font-medium text-gray-800">Jam:</span><br>
                                        {{ $r->jam }}
                                    </div>

                                    <div>
                                        <span class="font-medium text-gray-800">Dokter:</span><br>
                                        {{ $r->doctor->name ?? '-' }}
                                    </div>

                                    <div>
                                        <span class="font-medium text-gray-800">Layanan:</span><br>
                                        {{ $r->jenis_layanan }}
                                    </div>

                                </div>

                                {{-- KELUHAN --}}
                                <div class="mt-4">
                                    <p class="text-sm text-gray-500">
                                        <span class="font-medium text-gray-700">Keluhan:</span>
                                        {{ $r->keluhan ?: '-' }}
                                    </p>
                                </div>

                            </div>

                            {{-- RIGHT --}}
                            <div class="flex flex-wrap gap-3">

                                {{-- VIEW --}}
                                <a href="{{ route('dashboard.pendaftaran.reservasi.view', $r->id) }}"
                                    class="px-4 py-2 text-sm text-white bg-blue-600 rounded-xl hover:bg-blue-700">
                                    View
                                </a>

                                {{-- EDIT --}}
                                <a href="{{ route('dashboard.pendaftaran.reservasi.edit', $r->id) }}"
                                    class="px-4 py-2 text-sm text-white bg-orange-500 rounded-xl hover:bg-orange-600">
                                    Edit
                                </a>

                                {{-- DELETE --}}
                                <form method="POST"
                                    action="{{ route('dashboard.pendaftaran.reservasi.destroy', $r->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" onclick="return confirm('Batalkan reservasi ini?')"
                                        class="px-4 py-2 text-sm text-red-600 bg-red-100 rounded-xl hover:bg-red-200">
                                        Batalkan
                                    </button>
                                </form>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>
        @else
            <div class="p-12 text-center bg-white border border-gray-200 shadow rounded-2xl">
                <h3 class="mb-2 text-lg font-semibold text-gray-700">
                    Tidak Ada Reservasi
                </h3>
                <p class="mb-5 text-sm text-gray-500">
                    Belum ada data reservasi pada tanggal ini.
                </p>

                <a href="{{ route('dashboard.pendaftaran.reservasi.create') }}"
                    class="px-5 py-3 text-white bg-blue-600 rounded-xl hover:bg-blue-700">
                    + Buat Reservasi
                </a>
            </div>

        @endif

    </div>

@endsection
