@extends('layouts.dashboard')

@section('title', 'Master Data Medis')
@section('page-title', 'Master Data Medis')

@section('content')

    <div class="space-y-6">

        <div>
            <h2 class="text-2xl font-bold text-gray-800">Kelola Data ICD-10</h2>
            <p class="text-sm text-gray-500">Kelola daftar kode diagnosis penyakit</p>
        </div>


        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">


            <div class="relative w-full sm:w-64">
                <input type="text" placeholder="Cari data..."
                    class="w-full py-2 pl-10 pr-4 text-sm border rounded-lg focus:ring focus:ring-teal-200">
                <i class="absolute text-gray-400 -translate-y-1/2 fas fa-search left-3 top-1/2"></i>
            </div>


            <a href="{{ route('dashboard.superadmin.icd10.create') }}"
                class="flex items-center gap-2 px-5 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700">
                <i class="fas fa-plus"></i> Tambah Data
            </a>
        </div>


        <div class="overflow-hidden bg-white border rounded-xl">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-semibold text-left text-gray-600 uppercase">Kode ICD-10</th>
                        <th class="px-6 py-3 text-xs font-semibold text-left text-gray-600 uppercase">Nama Penyakit</th>
                        <th class="px-6 py-3 text-xs font-semibold text-left text-gray-600 uppercase">Kategori</th>
                        <th class="px-6 py-3 text-xs font-semibold text-center text-gray-600 uppercase">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @forelse ($icd10 as $item)
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium">
                                {{ $item->kode }}
                            </td>

                            <td class="px-6 py-4 text-sm">
                                {{ $item->nama_penyakit }}
                            </td>

                            <td class="px-6 py-4 text-sm">
                                {{ $item->kategori }}
                            </td>

                            <td class="px-6 py-4 space-x-2 text-center">

                                <a href="{{ route('dashboard.superadmin.icd10.show', $item->id) }}"
                                    class="p-2 text-white rounded-lg bg-cyan-500 hover:bg-cyan-600" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>


                                <a href="{{ route('dashboard.superadmin.icd10.edit', $item->id) }}"
                                    class="p-2 text-white bg-orange-500 rounded-lg hover:bg-orange-600" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>


                                <form action="{{ route('dashboard.superadmin.icd10.destroy', $item->id) }}" method="POST"
                                    class="inline delete-form">
                                    @csrf
                                    @method('DELETE')

                                    <button type="button"
                                        class="p-2 text-white bg-pink-600 rounded-lg hover:bg-pink-700 btn-delete"
                                        data-kode="{{ $item->kode }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>


                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-sm text-center text-gray-500">
                                Data ICD-10 belum tersedia
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>

@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function() {
                const form = this.closest('form');
                const kode = this.dataset.kode;

                Swal.fire({
                    title: 'Konfirmasi',
                    text: `Apakah Anda yakin ingin menghapus ICD-10 (${kode})?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Tidak',
                    reverseButtons: true,
                    customClass: {
                        confirmButton: 'bg-teal-500 text-white px-4 py-2 rounded-lg',
                        cancelButton: 'bg-red-500 text-white px-4 py-2 rounded-lg'
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
