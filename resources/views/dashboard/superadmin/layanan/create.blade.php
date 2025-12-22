@extends('layouts.dashboard')

@section('title', 'Tambah Layanan')
@section('page-title', 'Tambah Layanan')

@section('content')

    <div class="space-y-6">

        {{-- HEADER --}}
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Tambah Layanan</h2>
            <p class="text-sm text-gray-500">Form penambahan layanan klinik</p>
        </div>

        {{-- FORM --}}
        <div class="bg-white shadow rounded-xl">
            <form action="{{ route('dashboard.superadmin.layanan.store') }}" method="POST">
                @csrf

                {{-- BODY --}}
                <div class="p-6 space-y-6">

                    {{-- ROW 1 : KODE + KATEGORI --}}
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                        {{-- KODE LAYANAN --}}
                        <div>
                            <label class="block mb-1 text-sm font-medium text-gray-700">
                                Kode Layanan
                            </label>

                            <input type="text" name="kode_layanan"
                                class="w-full px-4 py-2 text-sm border rounded-lg focus:ring focus:ring-teal-200 focus:outline-none"
                                value="{{ old('kode_layanan') }}" placeholder="Contoh: KU01">

                            <p class="mt-1 text-xs text-gray-500">
                                Opsional. Jika dikosongkan, sistem akan membuat kode otomatis.
                            </p>

                            @error('kode_layanan')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- KATEGORI --}}
                        <div>
                            <label class="block mb-1 text-sm font-medium text-gray-700">
                                Kategori Layanan <span class="text-red-500">*</span>
                            </label>
                            <select name="kategori"
                                class="w-full px-4 py-2 text-sm border rounded-lg focus:ring focus:ring-teal-200 focus:outline-none"
                                required>
                                <option value="">-- Pilih Kategori --</option>
                                <option value="Layanan Umum">Layanan Umum</option>
                                <option value="Layanan Spesialis">Layanan Spesialis</option>
                                <option value="Layanan Gigi">Layanan Gigi</option>
                                <option value="Layanan Homecare">Layanan Homecare</option>
                                <option value="Layanan Lab">Layanan Lab</option>
                            </select>

                            @error('kategori')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    {{-- ROW 2 : NAMA --}}
                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-700">
                            Nama Layanan <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nama_layanan"
                            class="w-full px-4 py-2 text-sm border rounded-lg focus:ring focus:ring-teal-200 focus:outline-none"
                            value="{{ old('nama_layanan') }}" placeholder="Contoh: Konsultasi Umum" required>

                        @error('nama_layanan')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ROW 3 : TARIF --}}
                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-700">
                            Tarif (Rp) <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="tarif"
                            class="w-full px-4 py-2 text-sm border rounded-lg focus:ring focus:ring-teal-200 focus:outline-none"
                            value="{{ old('tarif') }}" placeholder="Contoh: 50000" min="0" required>

                        @error('tarif')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ROW 4 : DESKRIPSI --}}
                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-700">
                            Deskripsi
                        </label>
                        <textarea name="deskripsi" rows="4"
                            class="w-full px-4 py-2 text-sm border rounded-lg focus:ring focus:ring-teal-200 focus:outline-none"
                            placeholder="Keterangan tambahan layanan(opsional)">{{ old('deskripsi') }}</textarea>

                        @error('deskripsi')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                {{-- FOOTER --}}
                <div class="flex justify-end gap-3 px-6 py-4 border-t bg-gray-50">
                    <a href="{{ route('dashboard.superadmin.layanan.index') }}"
                        class="px-5 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">
                        Batal
                    </a>

                    <button type="submit"
                        class="px-6 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700">
                        Simpan
                    </button>
                </div>

            </form>
        </div>

    </div>

@endsection
