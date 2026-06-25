@extends('layouts.dashboard')

@section('title', 'Tambah Pasien')
@section('page-title', 'Tambah Pasien')

@section('content')
<div class="bg-white p-6 rounded-xl shadow max-w-xl">

<form action="{{ route('dashboard.pendaftaran.ManajemenPasien.store') }}" method="POST">
@csrf

<div class="space-y-4">
    <div>
        <input type="text" name="nik" class="w-full border p-2 rounded @error('nik') border-red-500 @enderror"
            placeholder="NIK 16 digit" value="{{ old('nik') }}" required>
        @error('nik') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <input type="text" name="no_rm" class="w-full border p-2 rounded @error('no_rm') border-red-500 @enderror"
            placeholder="Nomor Rekam Medis (misal: RM-001)" value="{{ old('no_rm') }}" required>
        @error('no_rm') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <input type="text" name="nama" class="w-full border p-2 rounded @error('nama') border-red-500 @enderror"
            placeholder="Nama Pasien" value="{{ old('nama') }}" required>
        @error('nama') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <input type="date" name="tanggal_lahir" class="w-full border p-2 rounded @error('tanggal_lahir') border-red-500 @enderror"
            placeholder="Tanggal Lahir" value="{{ old('tanggal_lahir') }}" required>
        @error('tanggal_lahir') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <select name="jenis_kelamin" class="w-full border p-2 rounded @error('jenis_kelamin') border-red-500 @enderror" required>
            <option value="">-- Jenis Kelamin --</option>
            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
        </select>
        @error('jenis_kelamin') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <input type="text" name="telepon" class="w-full border p-2 rounded @error('telepon') border-red-500 @enderror"
            placeholder="No Telepon" value="{{ old('telepon') }}" required>
        @error('telepon') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <select name="status_pasien" class="w-full border p-2 rounded @error('status_pasien') border-red-500 @enderror" required>
            <option value="">-- Status Pasien --</option>
            <option value="baru" {{ old('status_pasien') == 'baru' ? 'selected' : '' }}>Baru</option>
            <option value="lama" {{ old('status_pasien') == 'lama' ? 'selected' : '' }}>Lama</option>
        </select>
        @error('status_pasien') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="flex gap-2">
        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Simpan
        </button>
        <a href="{{ route('dashboard.pendaftaran.ManajemenPasien.index') }}"
           class="bg-gray-500 text-white px-4 py-2 rounded">
           Batal
        </a>
    </div>
</div>

</form>
</div>
@endsection
