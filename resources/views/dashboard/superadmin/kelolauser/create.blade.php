@extends('layouts.dashboard')

@section('title', 'Tambah User')

@section('content')

    <div class="max-w-3xl p-6 mx-auto bg-white shadow-md rounded-xl">

        <h2 class="mb-4 text-xl font-bold">Form Tambah User</h2>

        {{-- ERROR GLOBAL --}}
        @if ($errors->any())
            <div class="p-3 mb-4 text-red-700 bg-red-100 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('dashboard.superadmin.user.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

                {{-- NAMA --}}
                <div>
                    <label class="text-sm">Nama</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="w-full p-2 border rounded-md">
                    @error('name')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- USERNAME --}}
                <div>
                    <label class="text-sm">Username</label>
                    <input type="text" name="username" value="{{ old('username') }}"
                        class="w-full p-2 border rounded-md">
                    @error('username')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- EMAIL --}}
                <div>
                    <label class="text-sm">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="w-full p-2 border rounded-md">
                    @error('email')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- PASSWORD --}}
                <div>
                    <label class="text-sm">Password</label>
                    <input type="password" name="password" class="w-full p-2 border rounded-md">

                    <small class="text-gray-500">
                        Minimal 8 karakter, harus ada huruf besar & angka
                    </small>

                    @error('password')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- ROLE --}}
                <div>
                    <label class="text-sm">Role</label>
                    <select name="role" class="w-full p-2 border rounded-md">
                        <option value="">-- Pilih Role --</option>
                        <option value="super_admin" {{ old('role') == 'super_admin' ? 'selected' : '' }}>Super Admin
                        </option>
                        <option value="dokter" {{ old('role') == 'dokter' ? 'selected' : '' }}>Dokter</option>
                        <option value="perawat" {{ old('role') == 'perawat' ? 'selected' : '' }}>Perawat</option>
                        <option value="apoteker" {{ old('role') == 'apoteker' ? 'selected' : '' }}>Apoteker</option>
                    </select>
                    @error('role')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- SPESIALISASI --}}
                <div>
                    <label class="text-sm">Spesialisasi</label>
                    <input type="text" name="spesialisasi" value="{{ old('spesialisasi') }}"
                        class="w-full p-2 border rounded-md">
                    @error('spesialisasi')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="flex justify-end gap-2 mt-6">
                <a href="{{ route('dashboard.superadmin.kelolauser') }}" class="px-4 py-2 border rounded">
                    Batal
                </a>

                <button class="px-4 py-2 text-white bg-green-600 rounded">
                    Simpan
                </button>
            </div>
        </form>

    </div>

@endsection
