@extends('layouts.dashboard')

@section('title', 'Rekam Medis')
@section('page-title', 'Rekam Medis')

@section('content')

	<div class="mb-4">
		<div class="bg-amber-500 text-white rounded p-4">
			<div class="flex items-center justify-between">
				<div>
					<div class="text-sm">No. Antrian</div>
					<div class="font-semibold">#{{ $record->id }}</div>
				</div>
				<div>
					<div class="text-sm">Nama Pasien</div>
					<div class="font-semibold">{{ $record->patient->nama }}</div>
				</div>
				<div>
					<div class="text-sm">Umur</div>
					<div class="font-semibold">{{ now()->diffInYears($record->patient->tanggal_lahir) }} tahun</div>
				</div>
			</div>
		</div>
	</div>

	<div class="bg-white shadow rounded-lg p-6">
		<form action="{{ route('dashboard.dokter.record.store', ['id' => $record->id]) }}" method="POST">
			@csrf

			<!-- A. Data Subjektif -->
			<div class="mb-6">
				<h4 class="font-semibold">A. Data Subjektif</h4>
				<p class="text-sm text-gray-500">Keluhan Utama</p>
				<textarea name="keluhan_utama" rows="3" class="mt-2 block w-full border-l-4 border-amber-400 bg-white rounded px-3 py-2 text-sm" placeholder="Contoh: Demam sejak 2 hari yang lalu disertai batuk dan pilek">{{ old('keluhan_utama', $record->keluhan_utama) }}</textarea>
			</div>

			<!-- B. Data Objektif (Vital Signs) -->
			<div class="mb-6">
				<h4 class="font-semibold">B. Data Objektif (Vital Signs) - READ ONLY</h4>
				<p class="text-sm text-blue-600 bg-blue-50 p-2 rounded mt-2">Data objektif diisi oleh perawat dan tidak dapat diubah. Jika ada kesalahan, hubungi perawat untuk perbaikan.</p>

				<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
					<div>
						<label class="block text-sm text-gray-600">Tekanan Darah (mmHg)</label>
						<input type="text" readonly value="{{ $record->vitalSign->tekanan_darah ?? '' }}" class="mt-1 block w-full border rounded px-3 py-2 text-sm bg-gray-50" />
					</div>
					<div>
						<label class="block text-sm text-gray-600">Suhu Tubuh (°C)</label>
						<input type="text" readonly value="{{ $record->vitalSign->suhu ?? '' }}" class="mt-1 block w-full border rounded px-3 py-2 text-sm bg-gray-50" />
					</div>
					<div>
						<label class="block text-sm text-gray-600">Berat Badan (kg)</label>
						<input type="text" readonly value="{{ $record->vitalSign->berat_badan ?? '' }}" class="mt-1 block w-full border rounded px-3 py-2 text-sm bg-gray-50" />
					</div>
					<div>
						<label class="block text-sm text-gray-600">Tinggi Badan (cm)</label>
						<input type="text" readonly value="{{ $record->vitalSign->tinggi_badan ?? '' }}" class="mt-1 block w-full border rounded px-3 py-2 text-sm bg-gray-50" />
					</div>
				</div>

				<div class="mt-3">
					<label class="block text-sm text-gray-600">Catatan Perawat</label>
					<textarea readonly class="mt-1 block w-full border rounded px-3 py-2 text-sm bg-gray-50">{{ $record->vitalSign->catatan ?? 'Tidak ada catatan' }}</textarea>
				</div>
			</div>

			<!-- C. Diagnosis (Kode ICD-10) -->
			<div class="mb-6">
				<h4 class="font-semibold">C. Diagnosis (Kode ICD-10) <span class="text-red-500">*</span></h4>
				<div class="flex items-center gap-3 mt-2">
					<input type="text" name="diagnosa" value="{{ old('diagnosa', $record->diagnosa) }}" placeholder="Contoh: Demam ringan" class="block w-full border rounded px-3 py-2 text-sm" />
					<button type="button" class="bg-amber-500 text-white px-4 py-2 rounded" onclick="alert('Buka picker ICD-10')"><i class="fas fa-search mr-2"></i>Pilih Kode ICD-10</button>
				</div>
			</div>

			<!-- D. Tindakan Medis -->
			<div class="mb-6">
				<h4 class="font-semibold">D. Tindakan Medis</h4>
				<label class="block text-sm text-gray-600">Pemeriksaan / Tindakan</label>
				<textarea name="tindakan" rows="3" class="mt-2 block w-full border rounded px-3 py-2 text-sm" placeholder="Contoh: Pemeriksaan fisik, auskultasi paru, dll">{{ old('tindakan', $record->tindakan) }}</textarea>

				<label class="block text-sm text-gray-600 mt-4">Rujukan (jika ada)</label>
				<input type="text" name="rujukan" value="" placeholder="Contoh: Rujuk ke Spesialis Paru" class="mt-2 block w-full border rounded px-3 py-2 text-sm" />
			</div>

			<!-- E. Resep Obat -->
			<div class="mb-6">
				<h4 class="font-semibold">E. Resep Obat</h4>
				<div id="medicines-list" class="mt-3 space-y-2">
					<div class="border rounded p-3 flex items-center justify-between">
						<div>
							<div class="text-sm font-medium">Belum ada obat yang ditambahkan</div>
						</div>
						<div>
							<button type="button" id="add-medicine" class="bg-green-600 text-white px-3 py-1 rounded">+ Tambah Obat</button>
						</div>
					</div>
				</div>
			</div>

			<div class="flex justify-end items-center gap-3">
				<a href="{{ route('dashboard.dokter.queue') }}" class="px-4 py-2 border rounded text-sm">Batal</a>
				<button type="submit" class="px-4 py-2 bg-amber-600 text-white rounded text-sm">Simpan &amp; Kirim ke Apoteker</button>
			</div>
		</form>
	</div>

	<script>
		document.addEventListener('DOMContentLoaded', function(){
			const addBtn = document.getElementById('add-medicine');
			const list = document.getElementById('medicines-list');
			if(addBtn){
				addBtn.addEventListener('click', function(){
					const row = document.createElement('div');
					row.className = 'border rounded p-3 flex items-center gap-3';
					row.innerHTML = `
						<input name="medicines[]" placeholder="Nama obat" class="flex-1 border rounded px-3 py-2 text-sm" />
						<input name="medicine_doses[]" placeholder="Dosis" class="w-40 border rounded px-3 py-2 text-sm" />
						<button type="button" class="text-red-600 remove-medicine">Hapus</button>
					`;
					// remove placeholder message if exists
					const placeholder = list.querySelector('.text-sm.font-medium');
					if(placeholder) placeholder.closest('div').remove();
					list.appendChild(row);
					row.querySelector('.remove-medicine').addEventListener('click', function(){ row.remove(); });
				});
			}
		});
	</script>

@endsection
