@extends('layouts.dashboard')

@section('title', 'Detail Layanan')
@section('page-title', 'Detail Layanan')

@section('content')

    {{-- BACKDROP --}}
    <div class="fixed inset-0 z-40 bg-opacity-40"></div>

    {{-- MODAL --}}
    <div class="fixed inset-0 z-50 flex items-center justify-center">
        <div class="w-full max-w-2xl bg-white shadow-xl rounded-xl">

            {{-- HEADER --}}
            <div class="flex items-center justify-between px-6 py-4 border-b">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">Detail Layanan</h2>
                    <p class="text-sm text-gray-500">Informasi lengkap layanan</p>
                </div>

                <a href="{{ route('dashboard.manajer.layanan.index') }}" class="text-gray-400 hover:text-gray-600">
                    <i class="text-lg fas fa-times"></i>
                </a>
            </div>

            {{-- BODY --}}
            <div class="px-6 py-6 space-y-5">

                {{-- ROW 1 --}}
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

                    {{-- KODE --}}
                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-700">
                            Kode Layanan
                        </label>
                        <input type="text" class="w-full px-4 py-2 text-sm bg-gray-100 border rounded-lg"
                            value="LYN-{{ $layanan->id }}" readonly>
                    </div>

                    {{-- KATEGORI --}}
                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-700">
                            Kategori
                        </label>
                        <input type="text" class="w-full px-4 py-2 text-sm bg-gray-100 border rounded-lg"
                            value="{{ $layanan->kategori }}" readonly>
                    </div>

                </div>

                {{-- NAMA --}}
                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">
                        Nama Layanan
                    </label>
                    <input type="text" class="w-full px-4 py-2 text-sm bg-gray-100 border rounded-lg"
                        value="{{ $layanan->nama_layanan }}" readonly>
                </div>

                {{-- TARIF --}}
                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">
                        Tarif
                    </label>
                    <input type="text" class="w-full px-4 py-2 text-sm bg-gray-100 border rounded-lg"
                        value="Rp {{ number_format($layanan->tarif, 0, ',', '.') }}" readonly>
                </div>

                {{-- DESKRIPSI --}}
                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">
                        Deskripsi
                    </label>
                    <textarea rows="3" class="w-full px-4 py-2 text-sm bg-gray-100 border rounded-lg" readonly>{{ $layanan->deskripsi ?? '-' }}</textarea>
                </div>

            </div>

            {{-- FOOTER --}}
            <div class="flex justify-end gap-3 px-6 py-4 border-t bg-gray-50">

                <a href="{{ route('dashboard.manajer.layanan.index') }}"
                    class="px-5 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">
                    Tutup
                </a>

                <a href="{{ route('dashboard.manajer.layanan.edit', $layanan->id) }}"
                    class="px-6 py-2 text-sm font-medium text-white bg-orange-500 rounded-lg hover:bg-orange-600">
                    Edit
                </a>

            </div>

        </div>
    </div>

@endsection
