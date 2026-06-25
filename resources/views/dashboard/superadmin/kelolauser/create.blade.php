@extends('layouts.dashboard')

@section('title', 'Tambah User')

@section('content')

    <div class="max-w-3xl p-6 mx-auto bg-white shadow-md rounded-xl">

        <h2 class="mb-6 text-xl font-bold text-gray-800">
            Form Tambah User
        </h2>

        {{-- ERROR GLOBAL --}}
        @if ($errors->any())
            <div class="p-4 mb-5 text-red-700 bg-red-100 rounded-lg">
                <ul class="space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('dashboard.superadmin.user.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                {{-- NAMA --}}
                {{-- NAMA --}}
                <div>
                    <label class="block mb-1 text-sm font-medium">Nama</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="w-full p-2 border rounded-md">
                    @error('name')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- USERNAME --}}
                {{-- USERNAME --}}
                <div>
                    <label class="block mb-1 text-sm font-medium">Username</label>
                    <input type="text" name="username" value="{{ old('username') }}"
                        class="w-full p-2 border rounded-md">
                    @error('username')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- EMAIL --}}
                {{-- EMAIL --}}
                <div>
                    <label class="block mb-1 text-sm font-medium">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="w-full p-2 border rounded-md">
                    @error('email')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- PASSWORD --}}
                {{-- PASSWORD --}}
                <div>
                    <label class="block mb-1 text-sm font-medium">Password</label>
                    <input type="password" name="password" class="w-full p-2 border rounded-md">

                    <small class="text-gray-500">
                        Minimal 8 karakter, harus ada huruf besar & angka
                    </small>

                    @error('password')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror

                    <small class="text-gray-500">
                        Minimal 8 karakter, harus ada huruf besar & angka
                    </small>

                    @error('password')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- ROLE --}}
                {{-- ROLE --}}
                <div>
                    <label class="block mb-1 text-sm font-medium">Role</label>

                    <select name="role" id="roleSelect" class="w-full p-2 border rounded-md">

                        <option value="">-- Pilih Role --</option>

                        <option value="super_admin" {{ old('role') == 'super_admin' ? 'selected' : '' }}>
                            Super Admin
                        </option>

                        <option value="dokter" {{ old('role') == 'dokter' ? 'selected' : '' }}>
                            Dokter
                        </option>

                        <option value="perawat" {{ old('role') == 'perawat' ? 'selected' : '' }}>
                            Perawat
                        </option>

                        <option value="apoteker" {{ old('role') == 'apoteker' ? 'selected' : '' }}>
                            Apoteker
                        </option>

                    </select>

                    @error('role')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- SPESIALISASI --}}
                {{-- SPESIALISASI --}}
                <div>
                    <label class="block mb-1 text-sm font-medium">
                        Spesialisasi
                    </label>

                    <select name="spesialisasi" id="spesialisasiSelect" class="w-full p-2 bg-gray-100 border rounded-md"
                        disabled>

                        <option value="">-- Pilih Spesialisasi --</option>

                        <option value="Layanan Lab" {{ old('spesialisasi') == 'Layanan Lab' ? 'selected' : '' }}>
                            Layanan Lab
                        </option>

                        <option value="Layanan Homecare" {{ old('spesialisasi') == 'Layanan Homecare' ? 'selected' : '' }}>
                            Layanan Homecare
                        </option>

                        <option value="Layanan Spesialis"
                            {{ old('spesialisasi') == 'Layanan Spesialis' ? 'selected' : '' }}>
                            Layanan Spesialis
                        </option>

                        <option value="Layanan Umum" {{ old('spesialisasi') == 'Layanan Umum' ? 'selected' : '' }}>
                            Layanan Umum
                        </option>

                        <option value="Layanan Gigi" {{ old('spesialisasi') == 'Layanan Gigi' ? 'selected' : '' }}>
                            Layanan Gigi
                        </option>

                    </select>

                    <small class="text-gray-500">
                        Aktif hanya jika role = dokter
                    </small>

                    @error('spesialisasi')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- BUTTON --}}
            <div class="flex justify-end gap-3 mt-6">

                <a href="{{ route('dashboard.superadmin.kelolauser') }}"
                    class="px-4 py-2 border rounded-md hover:bg-gray-100">
                    Batal
                </a>

                <button type="submit" class="px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">
                    Simpan
                </button>

            </div>

        </form>

    </div>

    {{-- SCRIPT --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const role = document.getElementById('roleSelect');
            const spesialisasi = document.getElementById('spesialisasiSelect');

            function toggleSpesialisasi() {
                if (role.value === 'dokter') {
                    spesialisasi.disabled = false;
                    spesialisasi.classList.remove('bg-gray-100');
                } else {
                    spesialisasi.disabled = true;
                    spesialisasi.value = '';
                    spesialisasi.classList.add('bg-gray-100');
                }
            }

            role.addEventListener('change', toggleSpesialisasi);

            toggleSpesialisasi();
        });
    </script>

@endsection
