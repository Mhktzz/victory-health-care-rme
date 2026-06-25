@extends('layouts.dashboard')

@section('title', 'Edit Reservasi')
@section('page-title', 'Edit Reservasi')

@section('content')

    <div class="max-w-4xl mx-auto">

        {{-- HEADER --}}
        <div class="flex items-center justify-between p-6 mb-6 bg-white border shadow rounded-xl">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">
                    Edit Reservasi Pasien
                </h2>
                <p class="text-sm text-gray-500">
                    Perbarui data reservasi
                </p>
            </div>

            <a href="{{ route('dashboard.pendaftaran.reservasi.index') }}" class="px-4 py-2 text-gray-700 border rounded">
                ← Kembali
            </a>
        </div>

        {{-- FORM --}}
        <div class="p-6 bg-white border shadow rounded-xl">

            <form method="POST" action="{{ route('dashboard.pendaftaran.reservasi.update', $reservasi->id) }}"
                class="space-y-5">

                @csrf
                @method('PUT')

                {{-- PASIEN --}}
                <div>
                    <label class="block mb-1 text-sm font-medium">Nama Pasien</label>

                    <select name="patient_id" class="w-full border rounded-lg" required>

                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}"
                                {{ old('patient_id', $reservasi->patient_id) == $patient->id ? 'selected' : '' }}>
                                {{ $patient->nama }} - {{ $patient->no_rm }}
                            </option>
                        @endforeach

                    </select>
                </div>

                {{-- LAYANAN --}}
                <div>
                    <label class="block mb-1 text-sm font-medium">
                        Jenis Layanan
                    </label>

                    <select name="jenis_layanan" class="w-full border rounded-lg" required>

                        @foreach ($layanans as $layanan)
                            <option value="{{ $layanan->nama_layanan }}"
                                {{ old('jenis_layanan', $reservasi->jenis_layanan) == $layanan->nama_layanan ? 'selected' : '' }}>
                                {{ $layanan->kategori }} - {{ $layanan->nama_layanan }}
                            </option>
                        @endforeach

                    </select>
                </div>

                {{-- DOKTER --}}
                <div>
                    <label class="block mb-1 text-sm font-medium">Dokter</label>

                    <select name="doctor_id" class="w-full border rounded-lg" required>

                        @foreach ($dokters as $dokter)
                            <option value="{{ $dokter->id }}"
                                {{ old('doctor_id', $reservasi->doctor_id) == $dokter->id ? 'selected' : '' }}>
                                {{ $dokter->name }}
                                @if ($dokter->spesialisasi)
                                    - {{ $dokter->spesialisasi }}
                                @endif
                            </option>
                        @endforeach

                    </select>
                </div>

                {{-- TANGGAL JAM --}}
                <div class="grid grid-cols-2 gap-4">

                    <div>
                        <label class="block mb-1 text-sm font-medium">Tanggal</label>

                        <input type="date" name="tanggal" value="{{ old('tanggal', $reservasi->tanggal) }}"
                            class="w-full border rounded-lg">
                    </div>

                    <div>
                        <label class="block mb-1 text-sm font-medium">Jam</label>

                        <input type="time" name="jam" value="{{ old('jam', $reservasi->jam) }}"
                            class="w-full border rounded-lg">
                    </div>

                </div>

                {{-- STATUS --}}
                <div>
                    <label class="block mb-1 text-sm font-medium">
                        Status Reservasi
                    </label>

                    <select name="status" class="w-full border rounded-lg">

                        <option value="menunggu" {{ $reservasi->status == 'menunggu' ? 'selected' : '' }}>
                            Menunggu
                        </option>

                        <option value="diproses" {{ $reservasi->status == 'diproses' ? 'selected' : '' }}>
                            Diproses
                        </option>

                        <option value="menunggu_dokter" {{ $reservasi->status == 'menunggu_dokter' ? 'selected' : '' }}>
                            Menunggu Dokter
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
                    <label class="block mb-1 text-sm font-medium">
                        Keluhan
                    </label>

                    <textarea name="keluhan" rows="3" class="w-full border rounded-lg">{{ old('keluhan', $reservasi->keluhan) }}</textarea>
                </div>

                {{-- BUTTON --}}
                <div class="flex gap-3 pt-4">

                    <button type="submit" class="px-6 py-2 text-white bg-green-700 rounded-lg">
                        💾 Update
                    </button>

                    <a href="{{ route('dashboard.pendaftaran.reservasi.index') }}"
                        class="px-6 py-2 text-gray-700 bg-gray-300 rounded-lg">
                        Batal
                    </a>

                </div>

            </form>

        </div>

    </div>

@endsection
