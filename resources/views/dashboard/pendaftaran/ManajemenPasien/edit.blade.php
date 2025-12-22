@extends('layouts.dashboard')

@section('title', 'Edit Pasien')
@section('page-title', 'Edit Pasien')

@section('content')
<div class="bg-white p-6 rounded-xl shadow max-w-xl">

<form action="{{ route('dashboard.pendaftaran.ManajemenPasien.update', ['ManajemenPasien' => $patient->id]) }}" method="POST">
@csrf
@method('PUT')

<div class="space-y-4">
    <input type="text" name="nik" value="{{ $patient->nik }}"
        class="w-full border p-2 rounded" required>

    <input type="text" name="nama" value="{{ $patient->nama }}"
        class="w-full border p-2 rounded" required>

    <input type="number" name="umur" value="{{ $patient->umur }}"
        class="w-full border p-2 rounded" required>

    <select name="jenis_kelamin" class="w-full border p-2 rounded">
        <option value="Laki-laki"
            {{ $patient->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
            Laki-laki
        </option>
        <option value="Perempuan"
            {{ $patient->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
            Perempuan
        </option>
    </select>

    <input type="text" name="telepon" value="{{ $patient->telepon }}"
        class="w-full border p-2 rounded">

    <div class="flex gap-2">
        <button class="bg-orange-500 text-white px-4 py-2 rounded">
            Update
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
