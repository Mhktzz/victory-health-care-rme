@extends('layouts.dashboard')

@section('title', 'Riwayat Obat')
@section('page-title', 'Riwayat Obat')

@section('content')

{{-- ================= HEADER ================= --}}
<div class="mb-6">
    <h2 class="text-xl font-semibold">Riwayat Obat</h2>
    <p class="text-sm text-gray-500">Tracking obat keluar dan pasien penerima</p>
</div>

{{-- ================= SUMMARY ================= --}}
<div class="grid grid-cols-1 gap-4 mb-6 md:grid-cols-3">
    <div class="card">
        <div class="icon bg-pink-100 text-pink-600">
            <i class="fas fa-calendar"></i>
        </div>
        <div>
            <p class="text-sm text-gray-500">Total Transaksi</p>
            <p class="text-xl font-semibold">{{ $totalTransaksi }}</p>
        </div>
    </div>

    <div class="card">
        <div class="icon bg-teal-100 text-teal-600">
            <i class="fas fa-users"></i>
        </div>
        <div>
            <p class="text-sm text-gray-500">Pasien Terlayani</p>
            <p class="text-xl font-semibold">{{ $totalPasien }}</p>
        </div>
    </div>

    <div class="card">
        <div class="icon bg-orange-100 text-orange-600">
            <i class="fas fa-box"></i>
        </div>
        <div>
            <p class="text-sm text-gray-500">Obat Keluar</p>
            <p class="text-xl font-semibold">{{ $totalObatKeluar }}</p>
        </div>
    </div>
</div>

{{-- ================= FILTER ================= --}}
<div class="flex items-center justify-between mb-4">
    <div>
        <select class="input">
            <option>10</option>
            <option>25</option>
        </select>
        <span class="text-sm text-gray-500 ml-2">entries</span>
    </div>

    <div class="flex gap-2">
        <input type="text" class="input w-52" placeholder="Cari riwayat...">
        <input type="date" class="input">
    </div>
</div>

{{-- ================= TABLE ================= --}}
<div class="bg-white rounded-xl border shadow-sm">
    <table class="w-full text-sm">
        <thead class="border-b bg-gray-50">
            <tr>
                <th class="px-6 py-4 text-left">Tanggal & Waktu</th>
                <th>No. Resep</th>
                <th>Pasien Penerima</th>
                <th>NIK</th>
                <th>Dokter Pemberi Resep</th>
                <th>Jumlah Obat</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>

        <tbody class="divide-y">
            @foreach ($riwayat as $r)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">
                    {{ $r->created_at->format('d/m/Y') }}<br>
                    <span class="text-xs text-gray-500">
                        {{ $r->created_at->format('H:i') }}
                    </span>
                </td>

                <td>{{ $r->no_resep }}</td>
                <td>{{ $r->pasien->nama }}</td>
                <td>{{ $r->pasien->nik }}</td>
                <td>{{ $r->dokter->nama }}</td>
                <td>{{ $r->items_count }} item</td>

                <td class="text-center">
                    <button
                        onclick='openDetail(@json($r))'
                        class="icon-btn bg-teal-100 text-teal-600">
                        <i class="fas fa-eye"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="p-4">
        {{ $riwayat->links() }}
    </div>
</div>

{{-- ================= MODAL DETAIL ================= --}}
<div id="detailModal"
     class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40">

    <div class="w-[520px] bg-white rounded-xl p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Detail Riwayat Obat Keluar</h3>
            <button onclick="closeDetail()">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="space-y-3 text-sm">
            <div class="flex justify-between bg-gray-50 p-3 rounded">
                <div>
                    <p class="text-gray-500">No. Resep</p>
                    <p id="d_resep" class="font-medium"></p>
                </div>
                <div>
                    <p class="text-gray-500">Tanggal & Waktu</p>
                    <p id="d_waktu"></p>
                </div>
            </div>

            <div class="box">
                <p class="label">Pasien Penerima</p>
                <p id="d_pasien"></p>
                <p class="text-xs text-gray-500">NIK: <span id="d_nik"></span></p>
            </div>

            <div class="box">
                <p class="label">Dokter Pemberi Resep</p>
                <p id="d_dokter"></p>
            </div>

            <div>
                <p class="label mb-2">Obat Keluar</p>
                <div id="d_items" class="space-y-2"></div>
            </div>

            <div class="flex justify-between font-medium pt-2">
                <span>Total Item Obat Keluar:</span>
                <span id="d_total"></span>
            </div>
        </div>

        <div class="mt-4 text-right">
            <button onclick="closeDetail()" class="btn-gray">
                Tutup
            </button>
        </div>
    </div>
</div>

{{-- ================= STYLE ================= --}}
<style>
.input {
    border: 1px solid #e5e7eb;
    border-radius: .5rem;
    padding: .5rem .75rem;
}
.card {
    background: white;
    border-radius: 12px;
    padding: 16px;
    display: flex;
    gap: 12px;
    align-items: center;
    border: 1px solid #e5e7eb;
}
.icon {
    height: 44px;
    width: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
}
.icon-btn {
    height: 36px;
    width: 36px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.box {
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    padding: 12px;
}
.label {
    font-size: 12px;
    color: #6b7280;
}
.badge {
    background: #ec4899;
    color: white;
    padding: 4px 10px;
    border-radius: 999px;
    font-size: 12px;
}
.btn-gray {
    background: #f3f4f6;
    padding: 6px 14px;
    border-radius: 8px;
}
</style>

{{-- ================= SCRIPT ================= --}}
<script>
const modal = document.getElementById('detailModal');
const itemsBox = document.getElementById('d_items');

function openDetail(data) {
    modal.classList.remove('hidden');
    modal.classList.add('flex');

    document.getElementById('d_resep').innerText = data.no_resep;
    document.getElementById('d_waktu').innerText = data.created_at;
    document.getElementById('d_pasien').innerText = data.pasien.nama;
    document.getElementById('d_nik').innerText = data.pasien.nik;
    document.getElementById('d_dokter').innerText = data.dokter.nama;

    itemsBox.innerHTML = '';
    let total = 0;

    data.items.forEach(i => {
        total += i.jumlah;
        itemsBox.innerHTML += `
            <div class="box flex justify-between">
                <div>
                    <p>${i.obat.nama_obat}</p>
                    <p class="text-xs text-gray-500">
                        Jumlah: ${i.jumlah} ${i.obat.satuan}
                    </p>
                </div>
                <span class="badge">${i.jumlah} ${i.obat.satuan}</span>
            </div>
        `;
    });

    document.getElementById('d_total').innerText = total + ' unit';
}

function closeDetail() {
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}
</script>

@endsection
