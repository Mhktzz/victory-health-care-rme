@extends('layouts.dashboard')

@section('title', 'Reservasi & Penjadwalan')
@section('page-title', 'Reservasi & Penjadwalan')

@section('content')

{{-- HEADER --}}
<div class="bg-white rounded-xl shadow p-6 mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-xl font-semibold">Reservasi & Penjadwalan</h2>
        <p class="text-sm text-gray-500">Kelola reservasi pasien</p>
    </div>

    <a href="{{ route('dashboard.pendaftaran.reservasi.create') }}"
       class="px-4 py-2 bg-blue-600 text-white rounded-lg">
        + Buat Reservasi
    </a>
</div>

{{-- TABLE --}}
@if ($reservations->count())
<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-3 text-left">Pasien</th>
                <th class="px-4 py-3">Layanan</th>
                <th class="px-4 py-3">Dokter</th>
                <th class="px-4 py-3">Tanggal</th>
                <th class="px-4 py-3">Jam</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $r)
            <tr class="border-t">
                <td class="px-4 py-3">{{ $r->pasien_identitas }}</td>
                <td class="px-4 py-3">{{ $r->jenis_layanan }}</td>
                <td class="px-4 py-3">{{ $r->dokter }}</td>
                <td class="px-4 py-3">
                    {{ \Carbon\Carbon::parse($r->tanggal)->format('d M Y') }}
                </td>
                <td class="px-4 py-3">{{ $r->jam }}</td>
                <td class="px-4 py-3">
                    <span class="px-3 py-1 text-xs rounded-full
                        {{ $r->status === 'selesai' ? 'bg-green-100 text-green-700' :
                           ($r->status === 'menunggu' ? 'bg-yellow-100 text-yellow-700' :
                           'bg-red-100 text-red-700') }}">
                        {{ ucfirst($r->status) }}
                    </span>
                </td>

                {{-- AKSI ICON --}}
                <td class="px-4 py-3">
                    <div class="flex justify-center gap-2">

                        {{-- VIEW --}}
                        <a href="{{ route('dashboard.pendaftaran.reservasi.view', $r->id) }}"
                           title="View"
                           class="w-9 h-9 flex items-center justify-center bg-emerald-700 text-white rounded hover:bg-emerald-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5
                                      c4.478 0 8.268 2.943 9.542 7
                                      -1.274 4.057-5.064 7-9.542 7
                                      -4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </a>

{{-- EDIT --}}
<a href="{{ route('dashboard.pendaftaran.reservasi.edit', $r->id) }}"
   title="Edit"
   class="w-9 h-9 flex items-center justify-center bg-orange-500 text-white rounded hover:bg-orange-600">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
         viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M15.232 5.232l3.536 3.536M9 11l6.232-6.232
              a2.5 2.5 0 013.536 3.536L12.536 14.536
              a2.5 2.5 0 01-1.768.732H8v-2.768
              a2.5 2.5 0 01.732-1.768z" />
    </svg>
</a>


                        {{-- DELETE --}}
                        <form method="POST"
                              action="{{ route('dashboard.pendaftaran.reservasi.destroy', $r->id) }}">
                            @csrf
                            @method('DELETE')
                            <button title="Delete"
                                    onclick="return confirm('Hapus reservasi ini?')"
                                    class="w-9 h-9 flex items-center justify-center bg-pink-500 text-white rounded hover:bg-pink-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862
                                          a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6
                                          M9 7h6m2 0H7m3-3h4" />
                                </svg>
                            </button>
                        </form>

                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<div class="bg-white rounded-xl shadow p-10 text-center">
    Tidak ada reservasi
</div>
@endif

@endsection
