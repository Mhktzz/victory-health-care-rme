@extends('layouts.dashboard')

@section('title', 'Edit Reservasi')
@section('page-title', 'Edit Reservasi')

@section('content')

<div class="max-w-4xl mx-auto">

    {{-- HEADER --}}
    <div class="bg-white rounded-xl shadow p-6 mb-6 flex justify-between items-center border border-gray-200">
        <div>
            <h2 class="text-xl font-semibold text-gray-800">
                Edit Reservasi Pasien
            </h2>
            <p class="text-sm text-gray-500">
                Perbarui data reservasi
            </p>
        </div>

        <a href="{{ route('dashboard.pendaftaran.reservasi.index') }}"
           class="px-4 py-2 border-2 border-gray-400 text-gray-700 rounded hover:bg-gray-100">
            ← Kembali
        </a>
    </div>

    {{-- FORM --}}
    <div class="bg-white rounded-xl shadow p-6 border border-gray-200">

        <form method="POST"
              action="{{ route('dashboard.pendaftaran.reservasi.update', $reservasi->id) }}"
              class="space-y-5">

            @csrf
            @method('PUT')

            {{-- PASIEN --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Identitas Pasien
                </label>
                <input type="text"
                       name="pasien_identitas"
                       value="{{ old('pasien_identitas', $reservasi->pasien_identitas) }}"
                       class="w-full rounded-lg border-2 border-gray-300
                              focus:border-blue-600 focus:ring-2 focus:ring-blue-200">
            </div>

            {{-- JENIS LAYANAN --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Jenis Layanan
                </label>
                <input type="text"
                       name="jenis_layanan"
                       value="{{ old('jenis_layanan', $reservasi->jenis_layanan) }}"
                       class="w-full rounded-lg border-2 border-gray-300
                              focus:border-blue-600 focus:ring-2 focus:ring-blue-200">
            </div>

            {{-- DOKTER --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Dokter
                </label>
                <input type="text"
                       name="dokter"
                       value="{{ old('dokter', $reservasi->dokter) }}"
                       class="w-full rounded-lg border-2 border-gray-300
                              focus:border-blue-600 focus:ring-2 focus:ring-blue-200">
            </div>

            {{-- TANGGAL & JAM --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Tanggal
                    </label>
                    <input type="date"
                           name="tanggal"
                           value="{{ old('tanggal', $reservasi->tanggal) }}"
                           class="w-full rounded-lg border-2 border-gray-300
                                  focus:border-blue-600 focus:ring-2 focus:ring-blue-200">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Jam
                    </label>
                    <input type="time"
                           name="jam"
                           value="{{ old('jam', $reservasi->jam) }}"
                           class="w-full rounded-lg border-2 border-gray-300
                                  focus:border-blue-600 focus:ring-2 focus:ring-blue-200">
                </div>
            </div>

            {{-- STATUS --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Status Reservasi
                </label>
                <select name="status"
                        class="w-full rounded-lg border-2 border-gray-300
                               focus:border-blue-600 focus:ring-2 focus:ring-blue-200">
                    <option value="menunggu" {{ $reservasi->status == 'menunggu' ? 'selected' : '' }}>
                        Menunggu
                    </option>
                    <option value="diproses" {{ $reservasi->status == 'diproses' ? 'selected' : '' }}>
                        Diproses
                    </option>
                    <option value="selesai" {{ $reservasi->status == 'selesai' ? 'selected' : '' }}>
                        Selesai
                    </option>
                    <option value="dibatalkan" {{ $reservasi->status == 'dibatalkan' ? 'selected' : '' }}>
                        Dibatalkan
                    </option>
                </select>
            </div>

            {{-- KELUHAN --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Keluhan
                </label>
                <textarea name="keluhan"
                          rows="3"
                          class="w-full rounded-lg border-2 border-gray-300
                                 focus:border-blue-600 focus:ring-2 focus:ring-blue-200">{{ old('keluhan', $reservasi->keluhan) }}</textarea>
            </div>

            {{-- BUTTON --}}
            <div class="flex gap-3 pt-4">
                <button type="submit"
                        class="px-6 py-2 rounded-lg bg-green-700 text-white
                               border-2 border-green-800 hover:bg-green-800">
                    💾 Update
                </button>

                <a href="{{ route('dashboard.pendaftaran.reservasi.index') }}"
                   class="px-6 py-2 rounded-lg bg-gray-300 text-gray-700
                          border-2 border-gray-400 hover:bg-gray-400">
                    Batal
                </a>
            </div>

        </form>

    </div>
</div>

@endsection
