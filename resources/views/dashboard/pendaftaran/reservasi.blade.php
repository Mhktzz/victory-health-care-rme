@extends('layouts.dashboard')

@section('title', 'Reservasi & Penjadwalan')
@section('page-title', 'Reservasi & Penjadwalan')

{{-- Pastikan Alpine.js disertakan, jika belum ada di layout Anda --}}
@push('head-scripts')
{{-- Biasanya diletakkan di bagian head, tetapi pastikan konvensi layout Anda --}}
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
@endpush

@section('content')

{{-- Inisialisasi Alpine.js untuk mengontrol modal di level paling luar --}}
<div x-data="{ isModalOpen: false }">

    {{-- HEADER CARD --}}
    <div class="bg-white rounded-xl shadow p-6 mb-6">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

            {{-- JUDUL DAN DESKRIPSI --}}
            <div>
                <h2 class="text-xl font-semibold text-gray-800">
                    Reservasi & Penjadwalan
                </h2>
                <p class="text-sm text-gray-500">
                    Kelola jadwal dan estimasi waktu pasien
                </p>
            </div>

            {{-- TOMBOL BUAT RESERVASI (Membuka Modal) --}}
            <button
                @click="isModalOpen = true" {{-- Aksi klik untuk membuka modal --}}
                type="button"
                class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                <i class="fas fa-plus"></i>
                Buat Reservasi
            </button>
        </div>

        {{-- FILTER TANGGAL --}}
        <div class="mt-6">
            <label for="tanggal_reservasi" class="block mb-1 text-sm font-medium text-gray-700">
                Pilih Tanggal
            </label>
            <input type="date"
                id="tanggal_reservasi"
                value="{{ now()->format('Y-m-d') }}"
                class="px-4 py-2 border rounded-lg focus:ring focus:outline-none">
        </div>
    </div>

    {{-- ========================================================= --}}
    {{-- MODAL BUAT RESERVASI BARU --}}
    {{-- ========================================================= --}}
    <div x-show="isModalOpen"
        class="fixed inset-0 z-50 overflow-y-auto"
        style="display: none;"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">

        {{-- Backdrop --}}
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
            @click="isModalOpen = false"></div>

        {{-- Modal Dialog --}}
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            {{-- Card Modal --}}
            <div x-show="isModalOpen"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                
                {{-- Form Konten --}}
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">
                        Buat Reservasi Baru
                    </h3>
                    
                    {{-- FORMULIR (Sesuai Desain Gambar) --}}
                    <form action="#" method="POST">
                        @csrf
                        
                        {{-- Baris 1: Pasien & Jenis Layanan --}}
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="pasien" class="block text-sm font-medium text-gray-700">Pasien</label>
                                <select id="pasien" name="pasien" class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    <option>Pilih Pasien</option>
                                    {{-- TODO: Loop opsi pasien dari database --}}
                                </select>
                            </div>
                            <div>
                                <label for="jenis_layanan" class="block text-sm font-medium text-gray-700">Jenis Layanan</label>
                                <select id="jenis_layanan" name="jenis_layanan" class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    <option>Pilih Jenis Layanan</option>
                                    {{-- TODO: Loop opsi layanan dari database --}}
                                </select>
                            </div>
                        </div>

                        {{-- Baris 2: Dokter & Tanggal --}}
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="dokter" class="block text-sm font-medium text-gray-700">Dokter</label>
                                <select id="dokter" name="dokter" class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    <option>Pilih Dokter</option>
                                    {{-- TODO: Loop opsi dokter dari database --}}
                                </select>
                            </div>
                            <div>
                                <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                                {{-- Menggunakan format dd/mm/yyyy sesuai gambar, tetapi type date akan menampilkan format browser --}}
                                <input type="text" id="tanggal" name="tanggal" value="09/12/2024" readonly 
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-gray-50 rounded-md shadow-sm sm:text-sm">
                            </div>
                        </div>

                        {{-- Baris 3: Jam (Waktu) --}}
                        <div class="mb-4">
                            <label for="jam" class="block text-sm font-medium text-gray-700">Jam</label>
                            <input type="text" id="jam" name="jam" value="--:--" 
                                class="mt-1 block w-1/2 px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>

                        {{-- Baris 4: Keluhan --}}
                        <div class="mb-6">
                            <label for="keluhan" class="block text-sm font-medium text-gray-700">Keluhan</label>
                            <textarea id="keluhan" name="keluhan" rows="3" placeholder="Jelaskan keluhan pasien..." 
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                        </div>
                        
                        {{-- Tombol Aksi --}}
                        <div class="flex justify-end gap-3">
                            <button type="button" @click="isModalOpen = false" 
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200">
                                Batal
                            </button>
                            <button type="submit" 
                                class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                                Simpan Reservasi
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL --}}
    {{-- ========================================================= --}}

    {{-- EMPTY STATE --}}
    <div class="bg-white rounded-xl shadow p-10 flex flex-col items-center justify-center text-center">
        {{-- ICON --}}
        <div class="flex items-center justify-center w-16 h-16 mb-4 rounded-full bg-gray-100">
            <i class="fas fa-calendar-alt text-2xl text-gray-400"></i>
        </div>

        {{-- PESAN KOSONG --}}
        <p class="text-gray-600">
            Tidak ada reservasi untuk tanggal ini
        </p>

    </div>

</div> {{-- Akhir dari div x-data --}}

@endsection