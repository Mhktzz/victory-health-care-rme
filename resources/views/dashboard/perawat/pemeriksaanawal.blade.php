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
        <h3 class="font-bold text-lg">#{{ $id }}</h3>
    </div>
    <div>
        <p class="text-[10px] opacity-80 uppercase font-bold">Nama Pasien</p>
        <h3 class="font-bold text-lg">Joko Widodo</h3>
    </div>
    <div>
        <p class="text-[10px] opacity-80 uppercase font-bold">Umur</p>
        <h3 class="font-bold text-lg">48 Tahun</h3>
    </div>
    <div>
        <p class="text-[10px] opacity-80 uppercase font-bold">Jenis Kelamin</p>
        <h3 class="font-bold text-lg">Laki-laki</h3>
    </div>
</div>

{{-- FORM INPUT --}}
<div class="bg-white p-8 rounded-b-xl border border-t-0 shadow-sm mb-10">
    <form action="{{ route('dashboard.perawat.store') }}" method="POST">
        @csrf
        
        <div class="mb-6 p-4 bg-gray-50 rounded-lg border-l-4 border-[#519D9E]">
            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Keluhan Pasien (dari pendaftaran)</label>
            <p class="text-gray-800 font-medium italic">Batuk dan pilek</p>
        </div>

        <h4 class="text-[#519D9E] font-bold mb-4 flex items-center">
            <i class="fas fa-file-medical mr-2"></i> Input Data Objektif (Vital Signs) *
        </h4>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div>
                <label class="block text-sm font-semibold mb-2">Tekanan Darah (mmHg) <span class="text-red-500">*</span></label>
                <input type="text" name="tensi" class="w-full border-gray-300 rounded-lg p-3 focus:ring-[#519D9E] focus:border-[#519D9E]" placeholder="Contoh: 120/80" required>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-2">Suhu Tubuh (°C) <span class="text-red-500">*</span></label>
                <input type="text" name="suhu" class="w-full border-gray-300 rounded-lg p-3 focus:ring-[#519D9E] focus:border-[#519D9E]" placeholder="Contoh: 36.5" required>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-2">Berat Badan (kg) <span class="text-red-500">*</span></label>
                <input type="text" name="bb" class="w-full border-gray-300 rounded-lg p-3 focus:ring-[#519D9E] focus:border-[#519D9E]" placeholder="Contoh: 65" required>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-2">Tinggi Badan (cm) <span class="text-red-500">*</span></label>
                <input type="text" name="tb" class="w-full border-gray-300 rounded-lg p-3 focus:ring-[#519D9E] focus:border-[#519D9E]" placeholder="Contoh: 170" required>
            </div>
        </div>

        <div class="mb-8">
            <label class="block text-sm font-semibold mb-2">Catatan Awal (Opsional)</label>
            <textarea name="catatan" class="w-full border-gray-300 rounded-lg p-3 h-28 focus:ring-[#519D9E] focus:border-[#519D9E]" placeholder="Masukkan catatan tambahan untuk dokter..."></textarea>
        </div>

        <div class="flex justify-end space-x-4 border-t pt-6">
            <a href="{{ route('dashboard.perawat') }}" class="px-8 py-2.5 border border-gray-300 rounded-lg font-bold text-gray-600 hover:bg-gray-50 transition">Batal</a>
            <button type="submit" class="px-8 py-2.5 bg-[#519D9E] text-white rounded-lg font-bold hover:bg-teal-700 shadow-md transition">
                Simpan & Teruskan ke Dokter
            </button>
        </div>
    </form>
</div>
@endsection