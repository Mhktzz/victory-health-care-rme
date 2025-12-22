@extends('layouts.dashboard')

@section('title', 'Detail Pasien')
@section('page-title', 'Detail Pasien')

@section('content')

<div class="bg-white p-6 rounded-xl shadow space-y-3">
    <p><strong>NIK:</strong> {{ $patient->nik }}</p>
    <p><strong>Nama:</strong> {{ $patient->nama }}</p>
    <p><strong>Jenis Kelamin:</strong> {{ $patient->jenis_kelamin }}</p>
    <p><strong>telepon:</strong> {{ $patient->telepon }}</p>

    <a href="{{ route('dashboard.superadmin.datapasien.index') }}"
        class="inline-block mt-4 px-4 py-2 bg-gray-200 rounded-lg">
        Kembali
    </a>
</div>

@endsection
