@extends('layouts.dashboard')

@section('page-title', 'Edit User')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Edit User</h1>

    <form action="{{ route('dashboard.superadmin.user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                   class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" value="{{ old('username', $user->username) }}"
                   class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                   class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="w-full border px-3 py-2 rounded">
                <option value="super_admin" {{ $user->role=='super_admin'?'selected':'' }}>Super Admin</option>
                <option value="dokter" {{ $user->role=='dokter'?'selected':'' }}>Dokter</option>
                <option value="apoteker" {{ $user->role=='apoteker'?'selected':'' }}>Apoteker</option>
            </select>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Simpan
        </button>
    </form>
</div>
@endsection
