@extends('layouts.dashboard')

@section('page-title', 'Tambah Data Obat')

@section('content')

<div class="bg-white p-6 rounded-lg shadow max-w-3xl mx-auto">

    <h2 class="text-lg font-semibold mb-6">Tambah Data Obat</h2>

    {{-- ERROR VALIDATION --}}
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('superadmin.obat.store') }}" method="POST">
        @csrf

        {{-- KODE OBAT --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium">Kode Obat</label>
            <input
                type="text"
                name="kode_obat"
                class="w-full border rounded px-3 py-2"
                required
            >
        </div>

        {{-- NAMA OBAT --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium">Nama Obat</label>
            <input
                type="text"
                name="nama_obat"
                class="w-full border rounded px-3 py-2"
                required
            >
        </div>

        {{-- JENIS --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium">Jenis</label>
            <input
                type="text"
                name="jenis"
                class="w-full border rounded px-3 py-2"
                required
            >
        </div>

        {{-- SATUAN --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium">Satuan</label>
            <input
                type="text"
                name="satuan"
                class="w-full border rounded px-3 py-2"
                required
            >
        </div>

        {{-- STOK & KADALUARSA --}}
        <div class="grid grid-cols-2 gap-4 mb-6">

            {{-- STOK AWAL --}}
            <div>
                <label class="block mb-1 font-medium">Stok Awal</label>
                <input
                    type="number"
                    name="stok"
                    min="0"
                    class="w-full border rounded px-3 py-2"
                    required
                >
            </div>

            {{-- TANGGAL KADALUARSA --}}
            <div>
                <label class="block mb-1 font-medium">Tanggal Kadaluarsa</label>
                <input
                    type="date"
                    name="tanggal_kadaluarsa"
                    class="w-full border rounded px-3 py-2"
                    required
                >
            </div>

        </div>

        {{-- BUTTON --}}
        <div class="flex justify-end space-x-2">
            <a href="{{ route('superadmin.obat.index') }}"
               class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                Batal
            </a>

            <button type="submit"
                    class="px-4 py-2 bg-teal-600 text-white rounded hover:bg-teal-700">
                Simpan
            </button>
        </div>

    </form>
</div>

@endsection
