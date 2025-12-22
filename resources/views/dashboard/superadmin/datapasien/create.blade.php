@extends('layouts.dashboard')

@section('title', 'Tambah Pasien')
@section('page-title', 'Tambah Pasien')

@section('content')
<div class="bg-white shadow rounded-xl">
    <form action="{{ route('dashboard.superadmin.datapasien.store') }}" method="POST">
        @csrf

        <div class="p-6 space-y-4">
            <div>
                <label class="block text-sm">NIK</label>
                <input type="text" name="nik" class="w-full border rounded-lg px-4 py-2" required>
            </div>

            <div>
                <label class="block text-sm">Nama Lengkap</label>
                <input type="text" name="nama" class="w-full border rounded-lg px-4 py-2" required>
            </div>

            <div>
                <label class="block text-sm">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="w-full border rounded-lg px-4 py-2" required>
            </div>

            <div>
                <label class="block text-sm">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full border rounded-lg px-4 py-2">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <div>
                <label class="block text-sm">telepon</label>
                <input type="text" name="telepon" class="w-full border rounded-lg px-4 py-2">
            </div>
        </div>

        <div class="flex justify-end px-6 py-4 border-t">
            <a href="{{ route('dashboard.superadmin.datapasien.index') }}"
               class="px-4 py-2 bg-gray-200 rounded-lg">Batal</a>

            <button class="px-6 py-2 bg-green-600 text-white rounded-lg">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
