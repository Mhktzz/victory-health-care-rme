@extends('layouts.dashboard')

@section('title', 'Stok Obat')
@section('page-title', 'Stok Obat')

@section('content')

{{-- ================= ALERT ================= --}}
<div class="grid grid-cols-1 gap-4 mb-6 md:grid-cols-2">
    <div class="flex items-start gap-3 rounded-xl border border-red-200 bg-red-50 p-4">
        <div class="text-red-600">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <div>
            <p class="font-semibold text-red-700">Stok Menipis</p>
            <p class="text-sm text-red-600">
                {{ $stokMenipis }} obat stok di bawah minimum
            </p>
        </div>
    </div>

    <div class="flex items-start gap-3 rounded-xl border border-yellow-200 bg-yellow-50 p-4">
        <div class="text-yellow-600">
            <i class="fas fa-clock"></i>
        </div>
        <div>
            <p class="font-semibold text-yellow-700">Perhatian Kadaluarsa</p>
            <p class="text-sm text-yellow-600">
                {{ $obatKadaluarsa }} obat mendekati / melewati kadaluarsa
            </p>
        </div>
    </div>
</div>

{{-- ================= HEADER ================= --}}
<div class="flex flex-col gap-4 mb-6 md:flex-row md:items-center md:justify-between">
    <form method="GET" class="flex flex-wrap gap-3">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari obat..."
            class="input w-48">

        <select name="jenis" class="input w-40">
            <option value="">Semua Jenis</option>
            <option value="Tablet" @selected(request('jenis')=='Tablet')>Tablet</option>
            <option value="Kapsul" @selected(request('jenis')=='Kapsul')>Kapsul</option>
            <option value="Sirup" @selected(request('jenis')=='Sirup')>Sirup</option>
        </select>

        <button class="rounded-lg bg-gray-800 px-4 py-2 text-sm text-white hover:bg-gray-900">
            Filter
        </button>
    </form>

    <button
        type="button"
        onclick="openTambahModal()"
        class="rounded-lg bg-green-600 px-4 py-2 text-sm font-medium text-white hover:bg-green-700">
        + Tambah Obat
    </button>
</div>

{{-- ================= TABLE ================= --}}
<div class="bg-white rounded-xl border shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b text-gray-500">
                <tr>
                    <th class="px-6 py-4">Kode</th>
                    <th>Nama Obat</th>
                    <th>Jenis</th>
                    <th>Satuan</th>
                    <th>Stok</th>
                    <th>Kadaluarsa</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">
            @forelse ($obats as $obat)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium">
                        {{ $obat->kode_obat }}
                    </td>

                    <td>
                        <div class="flex flex-col">
                            <span>{{ $obat->nama_obat }}</span>

                            @if ($obat->stok_tersedia <= $obat->stok_minimum)
                                <span class="mt-1 w-fit rounded bg-red-100 px-2 py-0.5 text-xs text-red-700">
                                    Stok Menipis
                                </span>
                            @endif
                        </div>
                    </td>

                    <td>{{ $obat->jenis }}</td>
                    <td>{{ $obat->satuan }}</td>

                    <td class="font-medium">
                        {{ $obat->stok_tersedia }} {{ $obat->satuan }}
                    </td>

                    {{-- KADALUARSA --}}
                    <td>
                        @php
                            $tgl = \Carbon\Carbon::parse($obat->tanggal_kadaluarsa);
                        @endphp

                        @if ($tgl->isPast())
                            <span class="badge-red">{{ $tgl->format('d/m/Y') }}</span>
                        @elseif ($tgl->diffInDays(now()) <= 60)
                            <span class="badge-yellow">{{ $tgl->format('d/m/Y') }}</span>
                        @else
                            <span class="badge-green">{{ $tgl->format('d/m/Y') }}</span>
                        @endif
                    </td>

                    {{-- AKSI --}}
                    <td class="text-center">
                        <div class="flex justify-center gap-2">

                            <button
                                type="button"
                                onclick='openEditModal(@json($obat))'
                                class="icon-btn bg-orange-100 text-orange-600">
                                <i class="fas fa-pen"></i>
                            </button>

                            <form method="POST"
                                action="{{ route('dashboard.apoteker.stok.destroy', $obat) }}">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    onclick="return confirm('Hapus obat ini?')"
                                    class="icon-btn bg-red-100 text-red-600">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="py-6 text-center text-gray-500">
                        Data obat tidak ditemukan
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="p-4">
        {{ $obats->withQueryString()->links() }}
    </div>
</div>

{{-- ================= MODAL ================= --}}
<div id="modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40">
    <div class="w-[500px] rounded-xl bg-white p-6">
        <h2 id="modalTitle" class="mb-4 text-lg font-semibold">Tambah Obat</h2>

        <form id="modalForm" method="POST">
            @csrf
            <input type="hidden" name="_method" id="method">

            <input id="kode_obat" name="kode_obat" class="input" placeholder="Kode Obat">
            <input id="nama_obat" name="nama_obat" class="input" placeholder="Nama Obat">
            <input id="jenis" name="jenis" class="input" placeholder="Jenis">
            <input id="satuan" name="satuan" class="input" placeholder="Satuan">
            <input id="stok_tersedia" type="number" name="stok_tersedia" class="input" placeholder="Stok">
            <input id="stok_minimum" type="number" name="stok_minimum" class="input" placeholder="Stok Minimum">
            <input id="tanggal_kadaluarsa" type="date" name="tanggal_kadaluarsa" class="input">

            <div class="mt-4 flex justify-end gap-2">
                <button type="button" onclick="closeModal()">Batal</button>
                <button class="rounded bg-pink-600 px-4 py-2 text-white">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ================= STYLE ================= --}}
<style>
.input {
    border: 1px solid #e5e7eb;
    border-radius: .5rem;
    padding: .5rem .75rem;
    font-size: .875rem;
}
.icon-btn {
    height: 36px;
    width: 36px;
    border-radius: .5rem;
    display: flex;
    align-items: center;
    justify-content: center;
}
.badge-red {
    background: #fee2e2;
    color: #b91c1c;
    padding: 4px 10px;
    border-radius: 999px;
    font-size: 12px;
}
.badge-yellow {
    background: #fef3c7;
    color: #92400e;
    padding: 4px 10px;
    border-radius: 999px;
    font-size: 12px;
}
.badge-green {
    background: #dcfce7;
    color: #166534;
    padding: 4px 10px;
    border-radius: 999px;
    font-size: 12px;
}
</style>

{{-- ================= SCRIPT ================= --}}
<script>
const modal = document.getElementById('modal');
const modalTitle = document.getElementById('modalTitle');
const modalForm = document.getElementById('modalForm');
const method = document.getElementById('method');

const kode_obat = document.getElementById('kode_obat');
const nama_obat = document.getElementById('nama_obat');
const jenis = document.getElementById('jenis');
const satuan = document.getElementById('satuan');
const stok_tersedia = document.getElementById('stok_tersedia');
const stok_minimum = document.getElementById('stok_minimum');
const tanggal_kadaluarsa = document.getElementById('tanggal_kadaluarsa');

function openTambahModal() {
    modal.classList.remove('hidden');
    modal.classList.add('flex');

    modalTitle.innerText = 'Tambah Obat';
    modalForm.action = "{{ route('dashboard.apoteker.stok.store') }}";
    method.value = '';
    modalForm.reset();
}

function openEditModal(obat) {
    modal.classList.remove('hidden');
    modal.classList.add('flex');

    modalTitle.innerText = 'Edit Obat';
    modalForm.action = '/dashboard/apoteker/stok-obat/' + obat.id;
    method.value = 'PUT';

    kode_obat.value = obat.kode_obat;
    nama_obat.value = obat.nama_obat;
    jenis.value = obat.jenis;
    satuan.value = obat.satuan;
    stok_tersedia.value = obat.stok_tersedia;
    stok_minimum.value = obat.stok_minimum;
    tanggal_kadaluarsa.value = obat.tanggal_kadaluarsa;
}

function closeModal() {
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}
</script>

@endsection
