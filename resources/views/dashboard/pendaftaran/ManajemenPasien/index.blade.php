@extends('layouts.dashboard')

@section('title', 'Manajemen Pasien')
@section('page-title', 'Manajemen Pasien')

@section('content')
<div class="bg-white p-6 rounded-xl shadow">

    {{-- SEARCH NIK --}}
    <form method="GET" class="mb-6">
        <label class="block text-sm mb-2">Cari Pasien Lama Berdasarkan NIK</label>
        <div class="flex gap-2">
            <input type="text" name="nik" value="{{ request('nik') }}"
                class="w-full border rounded-lg px-4 py-2"
                placeholder="Masukkan NIK 16 digit">
            <button class="bg-teal-600 text-white px-5 rounded-lg">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </form>

    {{-- HEADER --}}
    <div class="flex justify-between items-center mb-4">
        <div>
            <h2 class="text-lg font-semibold">Manajemen Pasien</h2>
            <p class="text-sm text-gray-500">Kelola data pasien dengan NIK wajib</p>
        </div>
        <a href="{{ route('dashboard.pendaftaran.ManajemenPasien.create') }}"
            class="bg-green-600 text-white px-4 py-2 rounded-lg">
            + Input Pasien Baru
        </a>
    </div>

    {{-- TABLE --}}
    <div class="overflow-x-auto">
        <table class="w-full border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">NIK</th>
                    <th class="p-3">No RM</th>
                    <th class="p-3">Nama</th>
                    <th class="p-3">Umur</th>
                    <th class="p-3">Jenis Kelamin</th>
                    <th class="p-3">Telepon</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($patients as $patient)
                <tr class="border-b">
                    <td class="p-3">{{ $patient->nik }}</td>
                    <td class="p-3">{{ $patient->no_rm }}</td>
                    <td class="p-3">{{ $patient->nama }}</td>
                    <td class="p-3">{{ $patient->umur }} tahun</td>
                    <td class="p-3">{{ $patient->jenis_kelamin }}</td>
                    <td class="p-3">{{ $patient->telepon }}</td>
                    <td class="p-3">
                        <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded">
                            Pasien Lama
                        </span>
                    </td>
                    <td class="p-3 flex gap-2">
                        <a href="{{ route('dashboard.pendaftaran.ManajemenPasien.show', $patient->id) }}"
                            class="bg-teal-600 text-white px-3 py-1 rounded">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('dashboard.pendaftaran.ManajemenPasien.edit', $patient->id) }}"
                            class="bg-orange-500 text-white px-3 py-1 rounded">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('dashboard.pendaftaran.ManajemenPasien.destroy', $patient->id) }}"
                              method="POST"
                              onsubmit="return confirm('Hapus data pasien?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 text-white px-3 py-1 rounded">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center p-6 text-gray-500">
                        Data pasien tidak ditemukan
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
