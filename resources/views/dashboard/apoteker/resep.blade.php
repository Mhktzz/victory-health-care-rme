@extends('layouts.dashboard')

@section('title', 'Daftar Resep')
@section('page-title', 'Daftar Resep')

@section('content')

@php
$reseps = [
    [
        'no' => 'RX-2024-001',
        'tanggal' => '15/12/2024 · 09:30',
        'pasien' => 'Agus Prasetyo',
        'nik' => '3301012345670001',
        'dokter' => 'Dr. Budi Santoso',
        'status' => 'selesai',
        'obat' => [
            ['nama'=>'Paracetamol','dosis'=>'500 mg','frekuensi'=>'3x sehari','durasi'=>'5 hari'],
            ['nama'=>'Amoxicillin','dosis'=>'500 mg','frekuensi'=>'3x sehari','durasi'=>'7 hari'],
        ],
        'catatan'=>'Sesudah makan'
    ],
    [
        'no' => 'RX-2024-002',
        'tanggal' => '15/12/2024 · 10:00',
        'pasien' => 'Rina Kurniawati',
        'nik' => '3301014567890002',
        'dokter' => 'Dr. Sarah Wijaya',
        'status' => 'belum',
        'obat' => [
            ['nama'=>'Ibuprofen','dosis'=>'400 mg','frekuensi'=>'2x sehari','durasi'=>'3 hari'],
        ],
        'catatan'=>'Jika nyeri'
    ],
];

$selesai = collect($reseps)->where('status','selesai')->count();
$belum = collect($reseps)->where('status','belum')->count();
@endphp

{{-- COUNTER --}}
<div class="grid grid-cols-2 gap-6 mb-8">
    <div class="p-6 bg-white rounded-xl shadow flex items-center gap-4">
        <i class="fas fa-clock text-3xl text-yellow-500"></i>
        <div>
            <p class="text-sm text-gray-500">Belum Diproses</p>
            <p class="text-2xl font-bold">{{ $belum }}</p>
        </div>
    </div>
    <div class="p-6 bg-white rounded-xl shadow flex items-center gap-4">
        <i class="fas fa-check-circle text-3xl text-green-500"></i>
        <div>
            <p class="text-sm text-gray-500">Sudah Diproses</p>
            <p class="text-2xl font-bold">{{ $selesai }}</p>
        </div>
    </div>
</div>

{{-- CARD RESEP --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
@foreach($reseps as $r)
<div class="bg-white rounded-xl shadow p-6">
    <div class="flex justify-between items-start">
        <div>
            <p class="font-semibold">{{ $r['no'] }}</p>
            <p class="text-sm text-gray-500">{{ $r['tanggal'] }}</p>
        </div>
        <span class="px-3 py-1 text-xs rounded-full
        {{ $r['status']=='selesai' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
        {{ $r['status']=='selesai' ? 'Sudah Diproses' : 'Belum Diproses' }}
        </span>
    </div>

    <div class="mt-4 text-sm space-y-1">
        <p><strong>Pasien:</strong> {{ $r['pasien'] }}</p>
        <p><strong>NIK:</strong> {{ $r['nik'] }}</p>
        <p><strong>Dokter:</strong> {{ $r['dokter'] }}</p>
    </div>

    <div class="mt-6 flex gap-3">
        <button onclick="openDetail('{{ $r['no'] }}')" class="flex-1 bg-[#2f7f7b] text-white py-2 rounded-lg">
            <i class="fas fa-eye mr-1"></i> Lihat Detail
        </button>

        @if($r['status']=='belum')
        <button onclick="openConfirm('{{ $r['no'] }}')" class="flex-1 bg-pink-600 text-white py-2 rounded-lg">
            <i class="fas fa-check mr-1"></i> Tandai Selesai
        </button>
        @endif
    </div>
</div>
@endforeach
</div>

{{-- OVERLAY --}}
<div id="overlay" class="hidden fixed inset-0 bg-gray-900/40 backdrop-blur-sm z-40"></div>

{{-- MODAL DETAIL --}}
<div id="detailModal" class="hidden fixed inset-0 z-50 flex items-center justify-center">
<div class="bg-white rounded-xl w-full max-w-xl p-6">
<h2 class="font-bold text-lg mb-4">Detail Resep</h2>
<div id="detailContent" class="text-sm space-y-2"></div>
<div class="mt-6 text-right">
<button onclick="closeModal()" class="px-4 py-2 bg-gray-300 rounded-lg">Tutup</button>
</div>
</div>
</div>

{{-- MODAL KONFIRMASI --}}
<div id="confirmModal" class="hidden fixed inset-0 z-50 flex items-center justify-center">
<div class="bg-white rounded-xl w-full max-w-md p-6">
<h2 class="font-bold mb-2">Konfirmasi</h2>
<p class="text-sm mb-6">Apakah obat untuk resep <strong id="confirmNo"></strong> sudah diberikan?</p>
<div class="flex justify-end gap-3">
<button onclick="closeModal()" class="px-4 py-2 bg-gray-300 rounded-lg">Batal</button>
<button onclick="closeModal()" class="px-4 py-2 bg-green-600 text-white rounded-lg">
Ya, Sudah Diberikan
</button>
</div>
</div>
</div>

<script>
function openDetail(no){
document.getElementById('overlay').classList.remove('hidden');
document.getElementById('detailModal').classList.remove('hidden');
document.getElementById('detailContent').innerHTML = `
<p><strong>No Resep:</strong> ${no}</p>
<p>Status tergantung proses</p>
<p class="mt-3 font-semibold">Daftar Obat</p>
<ul class="list-disc pl-5">
<li>Paracetamol – 3x sehari – 5 hari</li>
<li>Amoxicillin – 3x sehari – 7 hari</li>
</ul>
<p class="mt-3"><strong>Catatan:</strong> Sesudah makan</p>`;
}

function openConfirm(no){
document.getElementById('overlay').classList.remove('hidden');
document.getElementById('confirmModal').classList.remove('hidden');
document.getElementById('confirmNo').innerText = no;
}

function closeModal(){
document.getElementById('overlay').classList.add('hidden');
document.getElementById('detailModal').classList.add('hidden');
document.getElementById('confirmModal').classList.add('hidden');
}
</script>

@endsection
