{{-- resources/views/dashboard/dokter/queue.blade.php --}}

@extends('layouts.dashboard')

@section('title', 'Antrian Pasien')
@section('page-title', 'Antrian Pasien')

@section('content')

    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Antrian Pasien</h1>
        <p class="text-sm text-gray-500">Daftar pasien menunggu pemeriksaan dokter</p>
    </div>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">

        <div class="p-6 bg-white rounded-lg shadow">
            <p class="text-sm text-gray-500">Menunggu</p>
            <h3 class="text-2xl font-bold">{{ $reservations->count() }}</h3>
            <p class="mt-2 text-sm text-gray-500">Pasien dalam antrian</p>
        </div>

        <div class="p-6 bg-white rounded-lg shadow">
            <p class="text-sm text-gray-500">Sedang Diperiksa</p>
            <h3 class="text-2xl font-bold">
                {{ \App\Models\Reservation::where('doctor_id', auth()->id())->where('status', 'sedang_diperiksa')->count() }}
            </h3>
            <p class="mt-2 text-sm text-gray-500">Pasien aktif</p>
        </div>

        <div class="p-6 bg-white rounded-lg shadow">
            <p class="text-sm text-gray-500">Selesai</p>
            <h3 class="text-2xl font-bold">
                {{ \App\Models\Reservation::where('doctor_id', auth()->id())->where('status', 'selesai')->whereDate('tanggal', now())->count() }}
            </h3>
            <p class="mt-2 text-sm text-gray-500">Hari ini</p>
        </div>

    </div>

    <div class="mt-8 bg-white rounded-lg shadow">

        <div class="p-6 border-b">
            <h2 class="text-lg font-semibold">Antrian Menunggu</h2>
            <p class="text-sm text-gray-500">Pasien yang sudah diperiksa perawat</p>
        </div>

        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm divide-y divide-gray-200">
                    <thead>
                        <tr class="font-semibold text-left text-gray-500 bg-gray-50">
                            <th class="px-4 py-3">No. Antrian</th>
                            <th class="px-4 py-3">Nama Pasien</th>
                            <th class="px-4 py-3">Umur / JK</th>
                            <th class="px-4 py-3">Jam Antrian</th>
                            <th class="px-4 py-3">Keluhan</th>
                            <th class="px-4 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($reservations as $reservation)
                            <tr>
                                <td class="px-4 py-4">
                                    <span class="inline-flex items-center justify-center w-10 h-10 font-bold text-teal-700 rounded-lg bg-teal-50">
                                        #{{ $loop->iteration }}
                                    </span>
                                </td>
                                <td class="px-4 py-4 font-semibold text-gray-800">
                                    {{ $reservation->patient->nama }}
                                </td>
                                <td class="px-4 py-4 text-gray-600">
                                    {{ \Carbon\Carbon::parse($reservation->patient->tanggal_lahir)->age }} tahun /
                                    {{ $reservation->patient->jenis_kelamin == 'L' ? 'L' : 'P' }}
                                </td>
                                <td class="px-4 py-4 font-medium text-gray-600">
                                    {{ \Carbon\Carbon::parse($reservation->jam)->format('H:i') }}
                                </td>
                                <td class="px-4 py-4 text-gray-600">
                                    {{ $reservation->keluhan ?? '-' }}
                                </td>
                                <td class="px-4 py-4 text-center">
                                    <div class="flex justify-center gap-2">
                                        <form action="{{ route('dashboard.dokter.call', $reservation->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="px-3 py-1.5 text-xs text-white rounded-lg bg-amber-500 hover:bg-amber-600">
                                                Panggil
                                            </button>
                                        </form>

                                        @if ($reservation->medical_record_id)
                                            <a href="{{ route('dashboard.dokter.record', $reservation->medical_record_id) }}" class="px-3 py-1.5 text-xs text-white rounded-lg bg-teal-600 hover:bg-teal-700">
                                                Rekam Medis
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-6 text-center text-gray-500">
                                    Tidak ada antrian pasien.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
