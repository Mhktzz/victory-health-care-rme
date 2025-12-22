@extends('layouts.dashboard')

@section('title', 'Reservasi & Penjadwalan')
@section('page-title', 'Reservasi & Penjadwalan')

@section('content')

{{-- HEADER --}}
<div class="bg-white rounded-xl shadow p-6 mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-xl font-semibold">Reservasi & Penjadwalan</h2>
        <p class="text-sm text-gray-500">Kelola jadwal dan estimasi waktu pasien</p>
    </div>

    <a href="{{ route('dashboard.pendaftaran.reservasi.create') }}"
       class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
        + Buat Reservasi
    </a>
</div>

{{-- FILTER TANGGAL (OPSIONAL UI) --}}
<div class="bg-white rounded-xl shadow p-6 mb-6">
    <label class="block text-sm font-medium text-gray-600 mb-2">
        Pilih Tanggal
    </label>
    <input type="date"
           value="{{ request('tanggal') ?? now()->format('Y-m-d') }}"
           class="border rounded-lg px-4 py-2 text-sm">
</div>

{{-- LIST RESERVASI --}}
@if ($reservations->count())
    <div class="space-y-4">
        @foreach ($reservations as $r)

            <div class="bg-white rounded-xl shadow p-6 flex flex-col lg:flex-row lg:items-center lg:justify-between">

                {{-- INFORMASI UTAMA --}}
                <div class="space-y-2">
                    <div class="flex items-center gap-3">
                        <h3 class="font-semibold text-gray-800">
                            {{ $r->pasien_identitas }}
                        </h3>

                        {{-- STATUS --}}
                        <span class="px-3 py-1 text-xs rounded-full
                            {{ $r->status === 'selesai' ? 'bg-green-100 text-green-700' :
                               ($r->status === 'menunggu' ? 'bg-yellow-100 text-yellow-700' :
                               'bg-red-100 text-red-700') }}">
                            {{ ucfirst($r->status) }}
                        </span>
                    </div>

                    {{-- DETAIL --}}
                    <div class="flex flex-wrap gap-6 text-sm text-gray-600">
                        <div class="flex items-center gap-2">
                             <span>{{ $r->jam }}</span>
                        </div>

                        <div class="flex items-center gap-2">
                             <span>{{ $r->dokter }}</span>
                        </div>

                        <div class="flex items-center gap-2">
                             <span>{{ $r->jenis_layanan }}</span>
                        </div>
                    </div>

                    {{-- KELUHAN --}}
                    <p class="text-sm text-gray-500">
                        Keluhan: {{ $r->keluhan ?? '-' }}
                    </p>
                </div>

                {{-- AKSI --}}
                <div class="flex gap-3 mt-4 lg:mt-0">

                    {{-- View --}}
                    <a href="{{ route('dashboard.pendaftaran.reservasi.view', $r->id) }}"
                       class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700">
                        View
                    </a>

                    {{-- EDIT --}}
                    <a href="{{ route('dashboard.pendaftaran.reservasi.edit', $r->id) }}"
                       class="px-4 py-2 bg-orange-500 text-white rounded-lg text-sm hover:bg-orange-600">
                        Edit
                    </a>

                    {{-- BATALKAN --}}
                    <form method="POST"
                          action="{{ route('dashboard.pendaftaran.reservasi.destroy', $r->id) }}">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Batalkan reservasi ini?')"
                                class="px-4 py-2 bg-red-100 text-red-600 rounded-lg text-sm hover:bg-red-200">
                            Batalkan
                        </button>
                    </form>

                </div>
            </div>

        @endforeach
    </div>
@else
    <div class="bg-white rounded-xl shadow p-10 text-center text-gray-500">
        Tidak ada reservasi
    </div>
@endif

@endsection
