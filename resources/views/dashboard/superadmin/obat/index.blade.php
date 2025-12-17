@extends('layouts.dashboard')

@section('page-title', 'Data Obat')

@section('content')

<div class="bg-white p-6 rounded-lg shadow">
    <div class="flex justify-between mb-4">
        <h2 class="text-lg font-semibold">Daftar Obat</h2>
        <a href="{{ route('superadmin.obat.create') }}"
           class="px-4 py-2 bg-teal-600 text-white rounded hover:bg-teal-700">
            + Tambah Obat
        </a>
    </div>

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-3">Kode</th>
                <th class="p-3">Nama</th>
                <th class="p-3">Jenis</th>
                <th class="p-3">Satuan</th>
                <th class="p-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicines as $medicine)
            <tr class="border-t">
                <td class="p-3">{{ $medicine->kode_obat }}</td>
                <td class="p-3">{{ $medicine->nama_obat }}</td>
                <td class="p-3">{{ $medicine->jenis }}</td>
                <td class="p-3">{{ $medicine->satuan }}</td>
                <td class="p-3 text-center space-x-2">
                    <a href="{{ route('superadmin.obat.edit', $medicine) }}"
                       class="text-blue-600">Edit</a>

                    <form action="{{ route('superadmin.obat.destroy', $medicine) }}"
                          method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Hapus data?')"
                                class="text-red-600">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
