@extends('layouts.dashboard')

@section('title', 'Detail User')
@section('page-title', 'Detail User')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Detail User</h1>

    <p><b>Nama:</b> {{ $user->name }}</p>
    <p><b>Email:</b> {{ $user->email }}</p>
    <p><b>Role:</b> {{ $user->role }}</p>

    <a href="{{ route('dashboard.superadmin.kelolauser') }}"
       class="mt-4 inline-block text-blue-600">
       Kembali
    </a>
</div>
@endsection
