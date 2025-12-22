@extends('layouts.dashboard')

@section('page-title', 'Edit Obat')

@section('content')
<div class="bg-white p-6 rounded-lg shadow w-1/2">

<form action="{{ route('superadmin.obat.update', $medicine) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- KODE OBAT -->
    <div class="mb-4">
        <label class="block font-medium mb-1">Kode Obat</label>
        <input type="text" name="kode_obat"
               value="{{ $medicine->kode_obat }}"
               class="w-full border rounded px-3 py-2" required>
    </div>

    <!-- NAMA OBAT -->
    <div class="mb-4">
        <label class="block font-medium mb-1">Nama Obat</label>
        <input type="text" name="nama_obat"
               value="{{ $medicine->nama_obat }}"
               class="w-full border rounded px-3 py-2" required>
    </div>

    <!-- JENIS -->
    <div class="mb-4">
        <label class="block font-medium mb-1">Jenis</label>
        <input type="text" name="jenis"
               value="{{ $medicine->jenis }}"
               class="w-full border rounded px-3 py-2" required>
    </div>

    <!-- SATUAN -->
    <div class="mb-4">
        <label class="block font-medium mb-1">Satuan</label>
        <input type="text" name="satuan"
               value="{{ $medicine->satuan }}"
               class="w-full border rounded px-3 py-2" required>
    </div>

    <hr class="my-4">

    <!-- STOK -->
    <div class="mb-4">
        <label class="block font-medium mb-1">Stok</label>
        <input type="number" name="stok"
               value="{{ $medicine->stocks->first()->stok ?? 0 }}"
               class="w-full border rounded px-3 py-2" min="0" required>
    </div>

    <!-- TANGGAL KADALUARSA -->
    <div class="mb-4">
        <label class="block font-medium mb-1">Tanggal Kadaluarsa</label>
        <input type="date" name="tanggal_kadaluarsa"
               value="{{ optional($medicine->stocks->first())->tanggal_kadaluarsa }}"
               class="w-full border rounded px-3 py-2" required>
    </div>

    <button class="bg-teal-600 text-white px-5 py-2 rounded hover:bg-teal-700">
        Update
    </button>
</form>

</div>
@endsection
