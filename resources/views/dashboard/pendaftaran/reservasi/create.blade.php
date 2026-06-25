@extends('layouts.dashboard')

@section('title', 'Buat Reservasi')
@section('page-title', 'Buat Reservasi')

@section('content')

    <div class="max-w-xl p-6 mx-auto bg-white shadow rounded-xl">

        <form method="POST" action="{{ route('dashboard.pendaftaran.reservasi.store') }}">
            @csrf

            {{-- PASIEN --}}
            <div class="mb-4">
                <label class="block mb-1">Nama Pasien</label>

                <select name="patient_id" class="w-full px-3 py-2 border rounded" required>
                    <option value="">-- Pilih Pasien --</option>

                    @foreach ($patients as $patient)
                        <option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? 'selected' : '' }}>
                            {{ $patient->nama }} - {{ $patient->no_rm }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- LAYANAN --}}
            <div class="mb-4">
                <label class="block mb-1">Jenis Layanan</label>

                <select name="jenis_layanan" class="w-full px-3 py-2 border rounded" required>
                    <option value="">-- Pilih Layanan --</option>

                    @foreach ($layanans as $layanan)
                        <option value="{{ $layanan->nama_layanan }}"
                            {{ old('jenis_layanan') == $layanan->nama_layanan ? 'selected' : '' }}>
                            {{ $layanan->kategori }} - {{ $layanan->nama_layanan }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- DOKTER --}}
            <div class="mb-4">
                <label class="block mb-1">Dokter</label>

                <select name="doctor_id" class="w-full px-3 py-2 border rounded" required>
                    <option value="">-- Pilih Dokter --</option>

                    @foreach ($dokters as $dokter)
                        <option value="{{ $dokter->id }}" {{ old('doctor_id') == $dokter->id ? 'selected' : '' }}>
                            {{ $dokter->name }}
                            @if ($dokter->spesialisasi)
                                - {{ $dokter->spesialisasi }}
                            @endif
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- TANGGAL --}}
            <div class="mb-4">
                <label class="block mb-1">Tanggal</label>
                <input type="date" name="tanggal" value="{{ old('tanggal') }}" class="w-full px-3 py-2 border rounded"
                    required>
            </div>

            {{-- JAM --}}
            <div class="mb-4">
                <label class="block mb-1">Jam</label>
                <input type="time" name="jam" value="{{ old('jam') }}" class="w-full px-3 py-2 border rounded"
                    required>
            </div>

            {{-- KELUHAN --}}
            <div class="mb-4">
                <label class="block mb-1">Keluhan</label>
                <textarea name="keluhan" class="w-full px-3 py-2 border rounded">{{ old('keluhan') }}</textarea>
            </div>

            {{-- BUTTON --}}
            <div class="flex justify-end gap-2">
                <a href="{{ route('dashboard.pendaftaran.reservasi.index') }}" class="px-4 py-2 bg-gray-200 rounded">
                    Kembali
                </a>

                <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded">
                    Simpan
                </button>
            </div>

        </form>

    </div>

@endsection
