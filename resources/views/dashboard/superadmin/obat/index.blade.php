@extends('layouts.dashboard')

@section('page-title', 'Data Obat')

@section('content')

<div class="bg-white p-6 rounded-lg shadow">

    {{-- HEADER --}}
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold">Daftar Obat</h2>

        <a href="{{ route('superadmin.obat.create') }}"
           class="px-4 py-2 bg-teal-600 text-white rounded hover:bg-teal-700">
            + Tambah Obat
        </a>
    </div>

    {{-- TABLE --}}
    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-3">Kode</th>
                <th class="p-3">Nama</th>
                <th class="p-3">Jenis</th>
                <th class="p-3">Satuan</th>
                <th class="p-3">Stok</th>
                <th class="p-3">Kadaluarsa</th>
                <th class="p-3 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>
        @forelse ($medicines as $medicine)
            <tr class="border-t">

                {{-- KODE --}}
                <td class="p-3">{{ $medicine->kode_obat }}</td>

                {{-- NAMA --}}
                <td class="p-3">{{ $medicine->nama_obat }}</td>

                {{-- JENIS --}}
                <td class="p-3">{{ $medicine->jenis }}</td>

                {{-- SATUAN --}}
                <td class="p-3">{{ $medicine->satuan }}</td>

                {{-- STOK --}}
                <td class="p-3">
                    {{ $medicine->stocks->sum('stok') }}
                </td>

                {{-- TANGGAL KADALUARSA --}}
                <td class="p-3">
                    @if ($medicine->stocks->first())
                        {{ \Carbon\Carbon::parse(
                            $medicine->stocks->first()->tanggal_kadaluarsa
                        )->format('d-m-Y') }}
                    @else
                        -
                    @endif
                </td>

                {{-- AKSI --}}
                <td class="p-3 text-center space-x-2">
                    <a href="{{ route('superadmin.obat.edit', $medicine) }}"
                       class="text-blue-600 hover:underline">
                        Edit
                    </a>

                    <form action="{{ route('superadmin.obat.destroy', $medicine) }}"
                          method="POST"
                          class="inline">
                        @csrf
                        @method('DELETE')

                        <button onclick="return confirm('Hapus data obat?')"
                                class="text-red-600 hover:underline">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="p-4 text-center text-gray-500">
                    Data obat belum tersedia
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

</div>

@endsection
