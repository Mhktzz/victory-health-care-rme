@extends('layouts.dashboard')

@section('title', 'Tambah Pasien')
@section('page-title', 'Tambah Pasien')

@section('content')
<div class="bg-white p-6 rounded-xl shadow max-w-xl">

<form action="{{ route('dashboard.pendaftaran.ManajemenPasien.store') }}" method="POST">
@csrf

<div class="space-y-4">
    <input type="text" name="nik" class="w-full border p-2 rounded"
        placeholder="NIK 16 digit" required>

    <input type="text" name="nama" class="w-full border p-2 rounded"
        placeholder="Nama Pasien" required>

    <input type="number" name="umur" class="w-full border p-2 rounded"
        placeholder="Umur" required>

    <select name="jenis_kelamin" class="w-full border p-2 rounded" required>
        <option value="">-- Jenis Kelamin --</option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>

    <input type="text" name="telepon" class="w-full border p-2 rounded"
        placeholder="No Telepon" required>

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
