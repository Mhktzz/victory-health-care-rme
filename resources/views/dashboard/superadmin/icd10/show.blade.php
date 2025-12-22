@extends('layouts.dashboard')

@section('title', 'Detail Data ICD-10')
@section('page-title', 'Detail Data ICD-10')

@section('content')

    <div class="fixed inset-0 z-40 bg-opacity-40"></div>


    <div class="fixed inset-0 z-50 flex items-center justify-center">

        <div class="w-full max-w-lg bg-white shadow-lg rounded-xl">

            <div class="flex items-center justify-between px-6 py-4 border-b">
                <h2 class="text-lg font-semibold text-gray-800">
                    Detail ICD-10
                </h2>

                <a href="{{ route('dashboard.superadmin.icd10.index') }}" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </a>
            </div>

            <div class="px-6 py-4 space-y-4">

                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">
                        Kode ICD-10
                    </label>
                    <input type="text" class="w-full px-4 py-2 text-sm bg-gray-100 border rounded-lg"
                        value="{{ $icd10->kode }}" disabled>
                </div>

                {{-- NAMA PENYAKIT --}}
                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">
                        Nama Penyakit
                    </label>
                    <input type="text" class="w-full px-4 py-2 text-sm bg-gray-100 border rounded-lg"
                        value="{{ $icd10->nama_penyakit }}" disabled>
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">
                        Kategori
                    </label>
                    <input type="text" class="w-full px-4 py-2 text-sm bg-gray-100 border rounded-lg"
                        value="{{ $icd10->kategori }}" disabled>
                </div>

            </div>


            <div class="flex justify-end gap-3 px-6 py-4 border-t">
                <a href="{{ route('dashboard.superadmin.icd10.index') }}"
                    class="px-4 py-2 text-sm text-gray-700 border rounded-lg hover:bg-gray-100">
                    Tutup
                </a>
            </div>

        </div>
    </div>

@endsection
