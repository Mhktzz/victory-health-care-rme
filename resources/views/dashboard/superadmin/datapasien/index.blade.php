@extends('layouts.dashboard')

@section('title', 'Data Pasien')
@section('page-title', 'Data Pasien')

@section('content')

<div class="bg-white p-6 rounded-xl shadow-md">

    <div class="flex justify-between items-center border-b pb-4 mb-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Data Pasien</h2>
            <p class="text-sm text-gray-500">Kelola data pasien</p>
        </div>
        <a href="{{ route('dashboard.superadmin.datapasien.create') }}"
            class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
            + Tambah Pasien
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500">NIK</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500">Nama</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500">JK</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500">No HP</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @foreach ($patients as $patient)
                    <tr>
                        <td class="px-4 py-3 text-sm">{{ $patient->nik }}</td>
                        <td class="px-4 py-3 text-sm">{{ $patient->nama }}</td>
                        <td class="px-4 py-3 text-sm">{{ $patient->jenis_kelamin }}</td>
                        <td class="px-4 py-3 text-sm">{{ $patient->telepon }}</td>
                        <td class="px-4 py-3 text-sm flex items-center space-x-4">

                            <a href="{{ route('dashboard.superadmin.datapasien.show', $patient) }}"
                            class="text-cyan-600 hover:text-cyan-800"
                            title="Lihat">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="{{ route('dashboard.superadmin.datapasien.edit', $patient) }}"
                            class="text-orange-500 hover:text-orange-700"
                            title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('dashboard.superadmin.datapasien.destroy', $patient) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin hapus data pasien?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-600 hover:text-red-800"
                                        title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
