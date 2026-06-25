@extends('layouts.dashboard')

@section('title', 'Edit Pasien')
@section('page-title', 'Edit Pasien')

@section('content')

<div class="bg-white shadow rounded-xl">
    <form action="{{ route('dashboard.superadmin.datapasien.update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="p-6 space-y-4">
            <div>
                <label class="block text-sm">NIK</label>
                <input type="text" name="nik" value="{{ $patient->nik }}"
                    class="w-full border rounded-lg px-4 py-2" required>
            </div>

            <div>
                <label class="block text-sm">Nama Lengkap</label>
                <input type="text" name="nama" value="{{ $patient->nama }}"
                    class="w-full border rounded-lg px-4 py-2" required>
            </div>

            <div>
                <label class="block text-sm">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir"
                    value="{{ $patient->tanggal_lahir }}"
                    class="w-full border rounded-lg px-4 py-2" required>
            </div>

            <div>
                <label class="block text-sm">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full border rounded-lg px-4 py-2" required>
                    <option value="L" {{ $patient->jenis_kelamin == 'L' ? 'selected' : '' }}>
                        Laki-laki
                    </option>
                    <option value="P" {{ $patient->jenis_kelamin == 'P' ? 'selected' : '' }}>
                        Perempuan
                    </option>
                </select>
            </div>

            <div>
                <label class="block text-sm">No HP</label>
                <input type="text" name="telepon" value="{{ $patient->telepon }}"
                    class="w-full border rounded-lg px-4 py-2" required>
            </div>
        </div>

        <div class="flex justify-end px-6 py-4 border-t">
            <a href="{{ route('dashboard.superadmin.datapasien.index') }}"
                class="px-4 py-2 bg-gray-200 rounded-lg">Batal</a>
            <button class="px-6 py-2 bg-orange-600 text-white rounded-lg">
                Update
            </button>
        </div>
    </form>
</div>

@endsection
