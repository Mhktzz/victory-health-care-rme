@extends('layouts.dashboard')

@section('title', 'Manajemen Layanan')
@section('page-title', 'Manajemen Layanan')

@section('content')

    <div class="space-y-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Manajemen Layanan</h2>
                <p class="text-sm text-gray-500">Daftar layanan dan tarif klinik</p>
            </div>

            <a href="{{ route('dashboard.superadmin.layanan.create') }}"
                class="inline-flex items-center gap-2 px-5 py-2 text-sm font-medium text-white transition bg-green-600 rounded-lg shadow hover:bg-green-700">
                <i class="fas fa-plus"></i>
                Tambah Layanan
            </a>
        </div>


        <hr>

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            {{-- LEFT : SHOW PER PAGE --}}
            <div class="flex items-center gap-2 text-sm text-gray-600">
                <span>Show</span>

                <select class="px-3 py-2 text-sm border rounded-lg focus:ring focus:ring-teal-200 focus:outline-none">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>

                <span>entries</span>
            </div>

            {{-- RIGHT : SEARCH & FILTER --}}
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center">

                {{-- SEARCH --}}
                <div class="relative w-full sm:w-64">
                    <input type="text" placeholder="Cari data..."
                        class="w-full py-2 pl-10 pr-4 text-sm border rounded-lg focus:ring focus:ring-teal-200 focus:outline-none">
                    <i class="absolute text-gray-400 -translate-y-1/2 fas fa-search left-3 top-1/2"></i>
                </div>

                {{-- FILTER JENIS KELAMIN --}}
                <div class="relative w-full sm:w-48">
                    <select
                        class="w-full px-4 py-2 text-sm border rounded-lg focus:ring focus:ring-teal-200 focus:outline-none">
                        <option value="">Semua Kategori</option>
                        <option value="L">Layanan Umum</option>
                        <option value="P">Layanan Spesialis</option>
                        <option value="P">Layanan Gigi</option>
                        <option value="P">Layanan Homecare</option>
                        <option value="P">Layanan Lab</option>
                    </select>
                </div>

            </div>

        </div>

        {{-- TABLE LAYANAN --}}
        <div class="bg-white shadow rounded-xl">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left">Kode</th>
                            <th class="px-6 py-3 text-left">Kategori</th>
                            <th class="px-6 py-3 text-left">Nama Layanan</th>
                            <th class="px-6 py-3 text-left">Tarif</th>
                            <th class="px-6 py-3 text-left">Deskripsi</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>
                        @forelse ($layanan as $item)
                            <tr class="border-b hover:bg-gray-50">

                                {{-- KODE --}}
                                <td class="px-6 py-4 font-mono text-sm text-gray-700">
                                    {{ $item->kode_layanan ?? '-' }}
                                </td>

                                {{-- KATEGORI --}}
                                <td class="px-6 py-4">
                                    {{ $item->kategori }}
                                </td>

                                {{-- NAMA --}}
                                <td class="px-6 py-4 font-medium">
                                    {{ $item->nama_layanan }}
                                </td>

                                {{-- TARIF --}}
                                <td class="px-6 py-4">
                                    Rp {{ number_format($item->tarif, 0, ',', '.') }}
                                </td>

                                {{-- DESKRIPSI --}}
                                <td class="px-6 py-4 text-gray-600">
                                    {{ $item->deskripsi ?? '-' }}
                                </td>
                                <td class="px-6 py-4 space-x-2 text-center">

                                    {{-- VIEW --}}
                                    <a href="{{ route('dashboard.superadmin.layanan.show', $item->id) }}"
                                        class="p-2 text-white rounded-lg bg-cyan-500 hover:bg-cyan-600"
                                        title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    {{-- EDIT --}}
                                    <a href="{{ route('dashboard.superadmin.layanan.edit', $item->id) }}"
                                        class="p-2 text-white bg-orange-500 rounded-lg hover:bg-orange-600" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    {{-- DELETE --}}
                                    <form action="{{ route('dashboard.superadmin.layanan.destroy', $item->id) }}"
                                        method="POST" class="inline delete-form">
                                        @csrf
                                        @method('DELETE')

                                        <button type="button"
                                            class="p-2 text-white bg-pink-600 rounded-lg hover:bg-pink-700 btn-delete"
                                            data-kode="{{ $item->kode_layanan }}" data-nama="{{ $item->nama_layanan }}">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                    </form>

                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-6 text-center text-gray-500">
                                    Data layanan belum tersedia
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.btn-delete').forEach(button => {
                button.addEventListener('click', function() {
                    const form = this.closest('form');
                    const kode = this.dataset.kode ?? '-';
                    const nama = this.dataset.nama ?? '';

                    Swal.fire({
                        title: 'Konfirmasi Hapus',
                        html: `
                        <div class="text-sm text-gray-600">
                            Apakah Anda yakin ingin menghapus layanan:
                            <br>
                            <strong class="text-gray-800">${kode}</strong>
                            <br>
                            <span class="text-xs">${nama}</span>
                        </div>
                    `,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Hapus',
                        cancelButtonText: 'Batal',
                        reverseButtons: true,
                        customClass: {
                            confirmButton: 'bg-pink-600 text-white px-4 py-2 rounded-lg',
                            cancelButton: 'bg-gray-300 text-gray-800 px-4 py-2 rounded-lg'
                        },
                        buttonsStyling: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endpush
