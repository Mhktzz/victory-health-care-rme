@extends('layouts.dashboard')

@section('title', 'Kelola User')
@section('page-title', 'Kelola User')

@section('content')

    {{-- CARD UTAMA MANAJEMEN USER--}}
    <div class="bg-white p-6 rounded-xl shadow-md">
        
        {{-- HEADER DAN TOMBOL TAMBAH USER--}}
        <div class="flex justify-between items-center border-b pb-4 mb-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Manajemen User</h2>
                <p class="text-sm text-gray-500">Kelola semua user dalam sistem</p>
            </div>
            {{-- Tombol Tambah User mengarah ke route create --}}
            <a href="{{ route('dashboard.superadmin.user.create') }}" class="flex items-center bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 shadow-md">
                <i class="fas fa-plus mr-2"></i> Tambah User
            </a>
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

            {{-- Search & Filter Role--}}
            <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2 w-full md:w-auto">
                <div class="relative w-full sm:w-64">
                    <input type="text" placeholder="Cari user..." class="border border-gray-300 rounded-md py-2 pl-10 pr-4 w-full text-sm focus:ring-cyan-500 focus:border-cyan-500">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
                <select class="border border-gray-300 rounded-md py-2 px-4 focus:ring-cyan-500 focus:border-cyan-500 w-full sm:w-auto text-sm">
                    <option>Semua Role</option>
                    <option>Superadmin</option>
                    <option>Dokter</option>
                    <option>Perawat</option>
                    <option>Apoteker</option>
                    <option>Admin Kantor</option>
                    <option>Manajer Operasional</option>
                </select>
            </div>
        </div>

        {{-- TABEL DATA USER--}}
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Username</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Spesialisasi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>

                {{-- DYNAMIC TABLE BODY (SESUAI DENGAN KODE ANDA) --}}
                <tbody class="bg-white divide-y divide-gray-200">
                    {{-- Ganti $users dengan data dummy jika Anda belum menyiapkan controller/model --}}
                    @forelse ($users as $user)
                    <tr>
                        {{-- Nama --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $user->name }}
                        </td>

                        {{-- Username --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $user->username }}
                        </td>

                        {{-- Email --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $user->email }}
                        </td>

                        {{-- Role --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            @php
                                $roleColors = [
                                    'super_admin' => 'bg-pink-100 text-pink-800', // Superadmin
                                    'dokter'      => 'bg-orange-100 text-orange-800', // Dokter
                                    'perawat'     => 'bg-indigo-100 text-indigo-800', // Perawat
                                    'apoteker'    => 'bg-red-100 text-red-800', // Apoteker
                                    'admin_kantor'=> 'bg-cyan-100 text-cyan-800', // Admin Kantor
                                    'manajer_operasional' => 'bg-purple-100 text-purple-800', // Manajer Operasional
                                ];
                                $roleKey = strtolower(str_replace(' ', '_', $user->role));
                                $roleDisplay = ucfirst(str_replace('_',' ', $user->role));
                            @endphp

                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                {{ $roleColors[$roleKey] ?? 'bg-gray-100 text-gray-800' }}">
                                {{ $roleDisplay }}
                            </span>
                        </td>

                        {{-- Spesialisasi --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $user->spesialisasi ?? '-' }}
                        </td>

                        {{-- Aksi (CRUD) --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-1">
                            {{-- Lihat (Read) --}}
                            <a href="{{ route('dashboard.superadmin.user.show', $user) }}"
                                class="text-cyan-600 hover:text-cyan-900 p-2" title="Lihat">
                                <i class="fas fa-eye"></i>
                            </a>

                            {{-- Edit (Update) --}}
                            <a href="{{ route('dashboard.superadmin.user.edit', $user) }}"
                                class="text-orange-600 hover:text-orange-900 p-2" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>

                            {{-- Hapus (Delete) --}}
                            <form action="{{ route('dashboard.superadmin.user.destroy', $user) }}" 
      method="POST" 
      class="inline"
      onsubmit="return confirm('Yakin ingin menghapus user {{ $user->name }}?')">
    @csrf
    @method('DELETE')

    <button type="submit" class="text-red-600 hover:text-red-900">
        <i class="fas fa-trash"></i>
    </button>
</form>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                            Tidak ada data user. Silakan tambahkan user baru.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- PAGINATION (Menggunakan kode dummy dari screenshot)--}}
        <div class="mt-4 flex justify-end items-center space-x-2 text-sm">
            {{-- Ini biasanya diganti dengan kode Blade untuk pagination Laravel: {{ $users->links() }} --}}
            <span class="px-3 py-1 border border-gray-300 rounded-md text-gray-600 disabled:opacity-50">
                Previous
            </span>
            <span class="px-3 py-1 bg-cyan-600 text-white rounded-md">1</span>
            <span class="px-3 py-1 border border-gray-300 rounded-md text-gray-600">
                2
            </span>
            <span class="px-3 py-1 border border-gray-300 rounded-md text-gray-600 disabled:opacity-50">
                Next
            </span>
        </div>

    </div>

@endsection