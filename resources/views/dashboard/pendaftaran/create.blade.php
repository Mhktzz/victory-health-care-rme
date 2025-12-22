@extends('layouts.dashboard')

@section('title', 'Tambah Reservasi')
@section('page-title', 'Tambah Reservasi Pasien')

@section('content')

<div class="bg-white p-6 rounded-xl shadow-md max-w-3xl mx-auto">

    <h2 class="text-xl font-bold mb-4">Form Tambah Reservasi Pasien</h2>

    <form action="{{ route('reservasi.store') }}" method="POST">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            {{-- Nama Pasien --}}
            <div>
                <label class="text-sm font-medium">Nama Pasien</label>
                <input type="text" name="nama_pasien"
                       class="w-full border rounded-md p-2"
                       required>
            </div>

            {{-- NIK --}}
            <div>
                <label class="text-sm font-medium">NIK</label>
                <input type="text" name="nik"
                       class="w-full border rounded-md p-2"
                       required>
            </div>

            {{-- Tanggal Kunjungan --}}
            <div>
                <label class="text-sm font-medium">Tanggal Kunjungan</label>
                <input type="date" name="tanggal"
                       class="w-full border rounded-md p-2"
                       required>
            </div>

            {{-- Jam Kunjungan --}}
            <div>
                <label class="text-sm font-medium">Jam Kunjungan</label>
                <input type="time" name="jam"
                       class="w-full border rounded-md p-2"
                       required>
            </div>

            {{-- Catatan (opsional) --}}
            <div class="md:col-span-2">
                <label class="text-sm font-medium">Catatan</label>
                <textarea name="catatan"
                          class="w-full border rounded-md p-2"
                          rows="3"
                          placeholder="Catatan tambahan (opsional)"></textarea>
            </div>

        </div>

        <div class="mt-6 flex justify-end gap-2">
            <a href="{{ route('reservasi.index') }}"
               class="px-4 py-2 border rounded">
                Batal
            </a>

            <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Simpan Reservasi
            </button>
        </div>
    </form>

</div>

@endsection
