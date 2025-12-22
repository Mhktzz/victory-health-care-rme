@extends('layouts.dashboard')

@section('title', 'Buat Reservasi')
@section('page-title', 'Buat Reservasi')

@section('content')

<div class="bg-white rounded-xl shadow p-6 max-w-xl mx-auto">

    <form method="POST" action="{{ route('dashboard.pendaftaran.reservasi.store') }}">
        @csrf

        <div class="mb-4">
            <label class="block mb-1">Nama Pasien</label>
            <input type="text" name="pasien_identitas"
                   class="w-full px-3 py-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Jenis Layanan</label>
            <input type="text" name="jenis_layanan"
                   class="w-full px-3 py-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Dokter</label>
            <input type="text" name="dokter"
                   class="w-full px-3 py-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Tanggal</label>
            <input type="date" name="tanggal"
                   class="w-full px-3 py-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Jam</label>
            <input type="time" name="jam"
                   class="w-full px-3 py-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Keluhan</label>
            <textarea name="keluhan"
                      class="w-full px-3 py-2 border rounded"></textarea>
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('dashboard.pendaftaran.reservasi.index') }}"
               class="px-4 py-2 bg-gray-200 rounded">
                Kembali
            </a>
            <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded">
                Simpan
            </button>
        </div>
    </form>

</div>

@endsection
