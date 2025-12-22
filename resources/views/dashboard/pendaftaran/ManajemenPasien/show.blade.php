@extends('layouts.dashboard')

@section('title', 'Detail Pasien')
@section('page-title', 'Detail Pasien')

@section('content')
<div class="bg-white p-6 rounded-xl shadow max-w-xl">
        <p><strong>NIK:</strong> {{ $patient->nik }}</p>
        <p><strong>No RM:</strong> {{ $patient->no_rm }}</p>
        <p><strong>Nama:</strong> {{ $patient->nama }}</p>
        <p><strong>Umur:</strong> {{ $patient->umur }} tahun</p>
        <p><strong>Jenis Kelamin:</strong> {{ $patient->jenis_kelamin }}</p>
        <p><strong>Telepon:</strong> {{ $patient->telepon }}</p>

    <a href="{{ route('dashboard.pendaftaran.ManajemenPasien.index') }}"
        class="inline-block mt-4 bg-gray-600 text-white px-4 py-2 rounded">
        Kembali
    </a>

</div>
@endsection
