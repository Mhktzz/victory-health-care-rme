@extends('layouts.dashboard')

@section('title', 'Data Pasien')
@section('page-title', 'Data Pasien')

@section('content')

    {{-- CARD UTAMA DATA PASIEN--}}
    <div class="bg-white p-6 rounded-xl shadow-md">
        
        {{-- HEADER DAN TOMBOL TAMBAH PASIEN--}}
        <div class="flex justify-between items-center border-b pb-4 mb-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Data Pasien</h2>
                <p class="text-sm text-gray-500">Kelola data pasien dengan NIK unik 16 digit</p>
            </div>
            <button class="flex items-center bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 shadow-md">
                <i class="fas fa-plus mr-2"></i> Tambah Pasien
            </button>
        </div>

        {{-- KONTROL TABEL (SHOW, SEARCH, FILTER)--}}
        <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0 md:space-x-4 mb-4">
            
            {{-- Show Entries--}}
            <div class="flex items-center space-x-2 text-sm text-gray-600">
                <span>Show</span>
                <select class="border border-gray-300 rounded-md p-1 focus:ring-pink-500 focus:border-pink-500">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                </select>
                <span>entries</span>
            </div>

            {{-- Search & Filter Status--}}
            <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2 w-full md:w-auto">
                <div class="relative w-full sm:w-64">
                    <input type="text" placeholder="Cari nama atau NIK..." class="border border-gray-300 rounded-md py-2 pl-10 pr-4 w-full text-sm focus:ring-cyan-500 focus:border-cyan-500">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
                <select class="border border-gray-300 rounded-md py-2 px-4 focus:ring-cyan-500 focus:border-cyan-500 w-full sm:w-auto text-sm">
                    <option>Semua Status</option>
                    <option>Pasien Baru</option>
                    <option>Pasien Lama</option>
                </select>
            </div>
        </div>

        {{-- TABEL DATA PASIEN--}}
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIK</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Lengkap</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Kelamin</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Umur</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No HP</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    {{-- Baris 1: Agus Prasetyo--}}
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">3301012345670001</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Agus Prasetyo</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Laki-laki</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">40 tahun</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">081234567890</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-lg bg-blue-100 text-blue-800">
                                Pasien Lama
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-1">
                            <button title="Lihat" class="text-cyan-600 hover:text-cyan-900 p-2"><i class="fas fa-eye"></i></button>
                            <button title="Edit" class="text-orange-600 hover:text-orange-900 p-2"><i class="fas fa-edit"></i></button>
                            <button title="Hapus" class="text-red-600 hover:text-red-900 p-2"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    {{-- Baris 2: Rina Kurniawati--}}
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">3301014567890002</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rina Kurniawati</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Perempuan</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">35 tahun</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">081298765432</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-lg bg-blue-100 text-blue-800">
                                Pasien Lama
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-1">
                            <button title="Lihat" class="text-cyan-600 hover:text-cyan-900 p-2"><i class="fas fa-eye"></i></button>
                            <button title="Edit" class="text-orange-600 hover:text-orange-900 p-2"><i class="fas fa-edit"></i></button>
                            <button title="Hapus" class="text-red-600 hover:text-red-900 p-2"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    {{-- Baris 3: Dimas Aditya--}}
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">3301015678901234</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Dimas Aditya</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Laki-laki</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10 tahun</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">081234561111</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-lg bg-green-100 text-green-800">
                                Pasien Baru
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-1">
                            <button title="Lihat" class="text-cyan-600 hover:text-cyan-900 p-2"><i class="fas fa-eye"></i></button>
                            <button title="Edit" class="text-orange-600 hover:text-orange-900 p-2"><i class="fas fa-edit"></i></button>
                            <button title="Hapus" class="text-red-600 hover:text-red-900 p-2"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    {{-- Baris 4: Sari Dewi--}}
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">3301016789012345</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Sari Dewi</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Perempuan</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">37 tahun</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">081297622222</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-lg bg-blue-100 text-blue-800">
                                Pasien Lama
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-1">
                            <button title="Lihat" class="text-cyan-600 hover:text-cyan-900 p-2"><i class="fas fa-eye"></i></button>
                            <button title="Edit" class="text-orange-600 hover:text-orange-900 p-2"><i class="fas fa-edit"></i></button>
                            <button title="Hapus" class="text-red-600 hover:text-red-900 p-2"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- PAGINATION--}}
        <div class="mt-4 flex justify-end items-center space-x-2 text-sm">
            <span class="px-3 py-1 border border-gray-300 rounded-md text-gray-600 disabled:opacity-50">
                Previous
            </span>
            <span class="px-3 py-1 bg-cyan-600 text-white rounded-md">1</span>
            <span class="px-3 py-1 border border-gray-300 rounded-md text-gray-600 disabled:opacity-50">
                Next
            </span>
        </div>

    </div>

@endsection