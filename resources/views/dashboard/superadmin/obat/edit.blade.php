@extends('layouts.dashboard')

@section('page-title', 'Edit Obat')

@section('content')
<form method="POST"
      action="{{ route('superadmin.obat.update', $medicine) }}"
      class="bg-white p-6 rounded shadow max-w-lg">
    @csrf @method('PUT')

    @foreach (['kode_obat','nama_obat','jenis','satuan'] as $field)
        <div class="mb-4">
            <label class="block mb-1">{{ ucwords(str_replace('_',' ',$field)) }}</label>
            <input name="{{ $field }}"
                   value="{{ $medicine->$field }}"
                   class="w-full border rounded p-2" required>
        </div>
    @endforeach

    <button class="bg-teal-600 text-white px-4 py-2 rounded">
        Update
    </button>
</form>
@endsection
