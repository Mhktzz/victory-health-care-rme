@extends('layouts.dashboard')

@section('page-title', 'Edit Pasien')

@section('content')

<form method="POST" action="{{ route('pendaftaran.patients.update', $patient->id) }}">
@csrf
@method('PUT')

<input name="nik" value="{{ $patient->nik }}" class="block w-full mb-2 p-2 border">
<input name="no_rm" value="{{ $patient->no_rm }}" class="block w-full mb-2 p-2 border">
<input name="nama" value="{{ $patient->nama }}" class="block w-full mb-2 p-2 border">
<input type="date" name="tanggal_lahir" value="{{ $patient->tanggal_lahir }}" class="block w-full mb-2 p-2 border">

<select name="jenis_kelamin" class="block w-full mb-2 p-2 border">
    <option value="L" @selected($patient->jenis_kelamin=='L')>Laki-laki</option>
    <option value="P" @selected($patient->jenis_kelamin=='P')>Perempuan</option>
</select>

<input name="telepon" value="{{ $patient->telepon }}" class="block w-full mb-2 p-2 border">

<button class="px-4 py-2 bg-blue-600 text-white rounded">
    Update
</button>

</form>
@endsection
