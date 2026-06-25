{{-- resources/views/dashboard/dokter/record.blade.php --}}

@extends('layouts.dashboard')

@section('title', 'Rekam Medis')
@section('page-title', 'Rekam Medis')

@section('content')

    <div class="mb-4">
        <div class="p-4 text-white rounded bg-amber-500">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm">No. RM</div>
                    <div class="font-semibold">#{{ $record->id }}</div>
                </div>

                <div>
                    <div class="text-sm">Nama Pasien</div>
                    <div class="font-semibold">{{ $record->patient->nama }}</div>
                </div>

                <div>
                    <div class="text-sm">Umur</div>
                    <div class="font-semibold">
                        {{ now()->diffInYears($record->patient->tanggal_lahir) }} tahun
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="p-6 bg-white rounded-lg shadow">

        {{-- 🔥 TAMBAH ID FORM --}}
        <form id="formRekamMedis" action="{{ route('dashboard.dokter.record.store', $record->id) }}" method="POST">
            @csrf

            {{-- A. DATA SUBJEKTIF --}}
            <div class="mb-6">
                <h4 class="font-semibold">A. Data Subjektif</h4>

                <label class="block mt-2 text-sm text-gray-600">Keluhan Utama</label>

                <textarea name="keluhan_utama" rows="3" class="w-full px-3 py-2 border rounded">{{ old('keluhan_utama', $record->keluhan_utama) }}</textarea>
            </div>

            {{-- B. DATA OBJEKTIF --}}
            <div class="mb-6">
                <h4 class="font-semibold">B. Data Objektif (Vital Signs)</h4>

                <p class="p-2 mt-2 text-sm text-blue-600 rounded bg-blue-50">
                    Data diambil otomatis dari input perawat.
                </p>

                <div class="grid grid-cols-1 gap-4 mt-4 md:grid-cols-2">

                    <div>
                        <label class="block text-sm">Tekanan Darah</label>
                        <input readonly value="{{ $record->vitalSign->tekanan_darah ?? '-' }}"
                            class="w-full px-3 py-2 border rounded bg-gray-50">
                    </div>

                    <div>
                        <label class="block text-sm">Suhu Tubuh</label>
                        <input readonly value="{{ $record->vitalSign->suhu ?? '-' }}"
                            class="w-full px-3 py-2 border rounded bg-gray-50">
                    </div>

                    <div>
                        <label class="block text-sm">Berat Badan</label>
                        <input readonly value="{{ $record->vitalSign->berat_badan ?? '-' }}"
                            class="w-full px-3 py-2 border rounded bg-gray-50">
                    </div>

                    <div>
                        <label class="block text-sm">Tinggi Badan</label>
                        <input readonly value="{{ $record->vitalSign->tinggi_badan ?? '-' }}"
                            class="w-full px-3 py-2 border rounded bg-gray-50">
                    </div>

                </div>

                <div class="mt-4">
                    <label class="block text-sm">Catatan Perawat</label>

                    <textarea readonly class="w-full px-3 py-2 border rounded bg-gray-50">{{ $record->vitalSign->catatan ?? '-' }}</textarea>
                </div>
            </div>

            {{-- C. DIAGNOSA --}}
            <div class="mb-6">
                <h4 class="font-semibold">C. Diagnosis ICD-10</h4>

                <select name="diagnosa" class="w-full px-3 py-2 border rounded">
                    <option value="">-- Pilih Diagnosa --</option>
                    @foreach ($icd10s as $icd)
                        <option value="{{ $icd->kode }} - {{ $icd->nama_penyakit }}"
                            {{ old('diagnosa', $record->diagnosa) == $icd->kode . ' - ' . $icd->nama_penyakit ? 'selected' : '' }}>
                            {{ $icd->kode }} - {{ $icd->nama_penyakit }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- D --}}
            <div class="mb-6">
                <h4 class="font-semibold">D. Tindakan</h4>
                <textarea name="tindakan" rows="3" class="w-full px-3 py-2 border rounded">{{ old('tindakan', $record->tindakan) }}</textarea>
            </div>

            {{-- E --}}
            <div class="mb-6">
                <h4 class="font-semibold">E. Rujukan</h4>
                <input type="text" name="rujukan" class="w-full px-3 py-2 border rounded">
            </div>

            {{-- F --}}
            <div class="mb-6">
                <h4 class="font-semibold">F. Resep Obat</h4>

                <div id="obat-wrapper" class="space-y-3">

                    <div class="grid grid-cols-1 gap-3 md:grid-cols-5 obat-item">
                        <select name="obat[]" class="px-3 py-2 border rounded">
                            <option value="">-- Pilih Obat --</option>
                            @foreach ($obats as $obat)
                                <option value="{{ $obat->id }}">
                                    {{ $obat->nama_obat }}
                                </option>
                            @endforeach
                        </select>

                        <input type="number" name="jumlah[]" class="px-3 py-2 border rounded">
                        <input type="text" name="dosis[]" class="px-3 py-2 border rounded">
                        <input type="text" name="aturan_pakai[]" class="px-3 py-2 border rounded">

                        <button type="button" class="px-2 text-white bg-red-500 rounded hapus-obat">
                            Hapus
                        </button>
                    </div>

                </div>

                <button type="button" id="tambah-obat" class="px-4 py-2 mt-3 text-white bg-green-600 rounded">
                    + Tambah Obat
                </button>
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('dashboard.dokter.queue') }}" class="px-4 py-2 border rounded">
                    Batal
                </a>

                <button type="submit" class="px-4 py-2 text-white rounded bg-amber-600">
                    Simpan
                </button>
            </div>

        </form>
    </div>

    {{-- 🔥 SWEETALERT --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const tombol = document.getElementById('tambah-obat');
            const wrapper = document.getElementById('obat-wrapper');

            tombol.addEventListener('click', function() {

                let firstItem = document.querySelector('.obat-item');
                let clone = firstItem.cloneNode(true);

                clone.querySelectorAll('input').forEach(input => input.value = '');
                clone.querySelector('select').selectedIndex = 0;

                clone.querySelector('.hapus-obat').addEventListener('click', function() {
                    clone.remove();
                });

                wrapper.appendChild(clone);
            });

            document.querySelectorAll('.hapus-obat').forEach(btn => {
                btn.addEventListener('click', function() {
                    btn.closest('.obat-item').remove();
                });
            });

            // 🔥 KONFIRMASI SUBMIT
            const form = document.getElementById('formRekamMedis');

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Yakin simpan data?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Swal.fire({
                            title: 'Menyimpan...',
                            allowOutsideClick: false,
                            didOpen: () => Swal.showLoading()
                        });

                        form.submit();
                    }
                });
            });

            // 🔥 NOTIFIKASI SUKSES
            @if (session('success'))
                Swal.fire({
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    icon: 'success'
                });
            @endif

        });
    </script>

@endsection
