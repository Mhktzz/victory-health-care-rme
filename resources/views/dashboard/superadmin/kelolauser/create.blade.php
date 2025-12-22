@extends('layouts.dashboard')

@section('title', 'Tambah User')

@section('content')

    <div class="max-w-3xl p-6 mx-auto bg-white shadow-md rounded-xl">

        <h2 class="mb-4 text-xl font-bold">Form Tambah User</h2>

        <form action="{{ route('dashboard.superadmin.user.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

                <div>
                    <label class="text-sm">Nama</label>
                    <input type="text" name="name" class="w-full p-2 border rounded-md">
                </div>

                <div>
                    <label class="text-sm">Username</label>
                    <input type="text" name="username" class="w-full p-2 border rounded-md">
                </div>

                <div>
                    <label class="text-sm">Email</label>
                    <input type="email" name="email" class="w-full p-2 border rounded-md">
                </div>

                <div>
                    <label class="text-sm">Password</label>
                    <input type="password" name="password" class="w-full p-2 border rounded-md">
                </div>

                <div>
                    <label class="text-sm">Role</label>
                    <select name="role" class="w-full p-2 border rounded-md">
                        <option value="">-- Pilih Role --</option>
                        <option value="super_admin">Super Admin</option>
                        <option value="dokter">Dokter</option>
                        <option value="perawat">Perawat</option>
                        <option value="apoteker">Apoteker</option>
                    </select>
                </div>

                <div>
                    <label class="text-sm">Spesialisasi</label>
                    <input type="text" name="spesialisasi" class="w-full p-2 border rounded-md">
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
