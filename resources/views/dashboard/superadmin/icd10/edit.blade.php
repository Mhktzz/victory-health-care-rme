@extends('layouts.dashboard')

@section('title', 'Edit Data ICD-10')
@section('page-title', 'Edit Data ICD-10')

@section('content')


    <div class="fixed inset-0 z-40 bg-opacity-40"></div>

    <div class="fixed inset-0 z-50 flex items-center justify-center">

        <div class="w-full max-w-lg bg-white shadow-lg rounded-xl">

            <div class="flex items-center justify-between px-6 py-4 border-b">
                <h2 class="text-lg font-semibold text-gray-800">
                    Edit Data ICD-10
                </h2>

                <a href="{{ route('dashboard.superadmin.icd10.index') }}" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </a>
            </div>


            <form action="{{ route('dashboard.superadmin.icd10.update', $icd10->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="px-6 py-4 space-y-4">


                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-700">
                            Kode ICD-10
                        </label>
                        <input type="text" name="kode"
                            class="w-full px-4 py-2 text-sm border rounded-lg focus:ring focus:ring-teal-200"
                            value="{{ old('kode', $icd10->kode) }}" required>
                        @error('kode')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-700">
                            Nama Penyakit
                        </label>
                        <input type="text" name="nama_penyakit"
                            class="w-full px-4 py-2 text-sm border rounded-lg focus:ring focus:ring-teal-200"
                            value="{{ old('nama_penyakit', $icd10->nama_penyakit) }}" required>
                        @error('nama_penyakit')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <select name="kategori"
                        class="w-full px-4 py-2 text-sm border rounded-lg focus:ring focus:ring-teal-200" required>

                        <option value="">-- Pilih Kategori --</option>

                        <option value="penyakit_gigi"
                            {{ old('kategori', $icd10->kategori) == 'penyakit_gigi' ? 'selected' : '' }}>
                            Penyakit Gigi
                        </option>

                        <option value="penyakit_umum"
                            {{ old('kategori', $icd10->kategori) == 'penyakit_umum' ? 'selected' : '' }}>
                            Penyakit Umum
                        </option>

                        <option value="gangguan_muskuloskeletal"
                            {{ old('kategori', $icd10->kategori) == 'gangguan_muskuloskeletal' ? 'selected' : '' }}>
                            Gangguan Muskuloskeletal
                        </option>

                        <option value="cedera_dan_trauma"
                            {{ old('kategori', $icd10->kategori) == 'cedera_dan_trauma' ? 'selected' : '' }}>
                            Cedera dan Trauma
                        </option>

                        <option value="penyakit_anak"
                            {{ old('kategori', $icd10->kategori) == 'penyakit_anak' ? 'selected' : '' }}>
                            Penyakit Anak
                        </option>

                        <option value="kondisi_perinatal"
                            {{ old('kategori', $icd10->kategori) == 'kondisi_perinatal' ? 'selected' : '' }}>
                            Kondisi Perinatal
                        </option>

                        <option value="kelainan_bawaan"
                            {{ old('kategori', $icd10->kategori) == 'kelainan_bawaan' ? 'selected' : '' }}>
                            Kelainan Bawaan
                        </option>

                        <option value="gangguan_nutrisi_anak"
                            {{ old('kategori', $icd10->kategori) == 'gangguan_nutrisi_anak' ? 'selected' : '' }}>
                            Gangguan Nutrisi Anak
                        </option>

                    </select>


                </div>

                {{-- FOOTER --}}
                <div class="flex justify-end gap-3 px-6 py-4 border-t">
                    <a href="{{ route('dashboard.superadmin.icd10.index') }}"
                        class="px-4 py-2 text-sm text-gray-700 border rounded-lg hover:bg-gray-100">
                        Batal
                    </a>

                    <button type="submit"
                        class="px-4 py-2 text-sm text-white bg-orange-500 rounded-lg hover:bg-orange-600">
                        Update
                    </button>
                </div>
            </form>

        </div>
    </div>

@endsection
