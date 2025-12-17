@extends('layouts.dashboard')

@section('page-title', 'Tambah Obat')

@section('content')
<form method="POST" action="{{ route('superadmin.obat.store') }}"
      class="bg-white p-6 rounded shadow max-w-lg">
    @csrf

    @foreach (['kode_obat'=>'Kode Obat','nama_obat'=>'Nama Obat','jenis'=>'Jenis','satuan'=>'Satuan'] as $name => $label)
        <div class="mb-4">
            <label class="block mb-1">{{ $label }}</label>
            <input name="{{ $name }}" class="w-full border rounded p-2" required>
        </div>
    @endforeach

    <button class="bg-teal-600 text-white px-4 py-2 rounded">
        Simpan
    </button>
</form>
@endsection
