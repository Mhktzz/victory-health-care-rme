@extends('layouts.dashboard')

@section('title', 'Form Pemeriksaan Awal')
@section('page-title', 'Pemeriksaan Awal')

@section('content')
    <div class="mb-6">
        <h2 class="text-xl font-bold text-gray-800">Input Pemeriksaan Awal</h2>
        <p class="text-sm text-gray-500">Silakan isi data vital sign pasien</p>
    </div>

    {{-- HEADER INFO PASIEN --}}
    <div class="bg-[#519D9E] text-white p-6 rounded-t-xl grid grid-cols-1 md:grid-cols-4 gap-4">

        <div>
            <p class="text-[10px] opacity-80 uppercase font-bold">No. Antrian</p>
            <h3 class="text-lg font-bold">#{{ $reservation->id }}</h3>
        </div>

        <div>
            <p class="text-[10px] opacity-80 uppercase font-bold">Nama Pasien</p>
            <h3 class="text-lg font-bold">
                {{ $reservation->patient->nama ?? '-' }}
            </h3>
        </div>

        <div>
            <p class="text-[10px] opacity-80 uppercase font-bold">Umur</p>
            <h3 class="text-lg font-bold">
                {{ $reservation->patient->umur ?? '-' }} Tahun
            </h3>
        </div>

        <div>
            <p class="text-[10px] opacity-80 uppercase font-bold">Jenis Kelamin</p>
            <h3 class="text-lg font-bold">
                {{ $reservation->patient->jenis_kelamin ?? '-' }}
            </h3>
        </div>

    </div>

    {{-- FORM INPUT --}}
    <div class="p-8 mb-10 bg-white border border-t-0 shadow-sm rounded-b-xl">
        <form action="{{ route('dashboard.perawat.store') }}" method="POST">
            @csrf

            {{-- 🔥 penting: kirim id reservation --}}
            <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">

            {{-- KELUHAN --}}
            <div class="mb-6 p-4 bg-gray-50 rounded-lg border-l-4 border-[#519D9E]">
                <label class="block mb-1 text-xs font-bold text-gray-500 uppercase">
                    Keluhan Pasien (dari pendaftaran)
                </label>
                <p class="italic font-medium text-gray-800">
                    {{ $reservation->keluhan }}
                </p>
            </div>

            <h4 class="text-[#519D9E] font-bold mb-4 flex items-center">
                <i class="mr-2 fas fa-file-medical"></i> Input Data Objektif (Vital Signs) *
            </h4>

            <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-2">
                <div>
                    <label class="block mb-2 text-sm font-semibold">
                        Tekanan Darah (mmHg)
                    </label>
                    <input type="text" name="tensi" class="w-full p-3 border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-semibold">
                        Suhu Tubuh (°C)
                    </label>
                    <input type="text" name="suhu" class="w-full p-3 border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-semibold">
                        Berat Badan (kg)
                    </label>
                    <input type="text" name="bb" class="w-full p-3 border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-semibold">
                        Tinggi Badan (cm)
                    </label>
                    <input type="text" name="tb" class="w-full p-3 border-gray-300 rounded-lg">
                </div>
            </div>

            <div class="mb-8">
                <label class="block mb-2 text-sm font-semibold">Catatan Awal</label>
                <textarea name="catatan" class="w-full p-3 border-gray-300 rounded-lg h-28"></textarea>
            </div>

            <div class="flex justify-end pt-6 space-x-4 border-t">
                <a href="{{ route('dashboard.perawat') }}"
                    class="px-8 py-2.5 border border-gray-300 rounded-lg font-bold text-gray-600">
                    Batal
                </a>

                <button type="submit" class="px-8 py-2.5 bg-[#519D9E] text-white rounded-lg font-bold">
                    Simpan & Teruskan ke Dokter
                </button>
            </div>
        </form>
    </div>
@endsection
