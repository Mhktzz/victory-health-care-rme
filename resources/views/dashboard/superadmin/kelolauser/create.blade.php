@extends('layouts.dashboard')

@section('title', 'Tambah User')

@section('content')
<h1>TEST CREATE</h1>

<div class="bg-white p-6 rounded-xl shadow-md max-w-3xl mx-auto">

    <h2 class="text-xl font-bold mb-4">Form Tambah User</h2>

    <form action="{{ route('dashboard.superadmin.user.store') }}" method="POST">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div>
                <label class="text-sm">Nama</label>
                <input type="text" name="name" class="w-full border rounded-md p-2">
            </div>

            <div>
                <label class="text-sm">Username</label>
                <input type="text" name="username" class="w-full border rounded-md p-2">
            </div>

            <div>
                <label class="text-sm">Email</label>
                <input type="email" name="email" class="w-full border rounded-md p-2">
            </div>

            <div>
                <label class="text-sm">Password</label>
                <input type="password" name="password" class="w-full border rounded-md p-2">
            </div>

            <div>
                <label class="text-sm">Role</label>
                <select name="role" class="w-full border rounded-md p-2">
                    <option value="">-- Pilih Role --</option>
                    <option value="super_admin">Super Admin</option>
                    <option value="dokter">Dokter</option>
                    <option value="perawat">Perawat</option>
                    <option value="apoteker">Apoteker</option>
                </select>
            </div>

            <div>
                <label class="text-sm">Spesialisasi</label>
                <input type="text" name="spesialisasi" class="w-full border rounded-md p-2">
            </div>

        </div>

        <div class="mt-6 flex justify-end gap-2">
            <a href="{{ route('dashboard.superadmin.kelolauser') }}"
               class="px-4 py-2 border rounded">
                Batal
            </a>

            <button class="px-4 py-2 bg-green-600 text-white rounded">
                Simpan
            </button>
        </div>
    </form>

</div>
@endsection
