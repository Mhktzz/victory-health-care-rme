@extends('layouts.dashboard')

@section('title', 'Resep Masuk')
@section('page-title', 'Resep Masuk')

@section('content')

    {{-- HEADER HALAMAN --}}
    <div class="mb-6">
        <h2 class="text-xl font-bold text-gray-800">Resep Masuk</h2>
        <p class="text-sm text-gray-500">Daftar resep dari dokter yang siap diproses</p>
    </div>

    {{-- ================= COUNTER ================= --}}
    <div class="grid grid-cols-2 gap-6 mb-8">
        <div class="flex items-center gap-4 p-6 bg-white shadow rounded-xl">
            <i class="text-3xl text-yellow-500 fas fa-clock"></i>
            <div>
                <p class="text-sm text-gray-500">Belum Diproses</p>
                <p class="text-2xl font-bold">{{ $belum }}</p>
            </div>
        </div>

        <div class="flex items-center gap-4 p-6 bg-white shadow rounded-xl">
            <i class="text-3xl text-green-500 fas fa-check-circle"></i>
            <div>
                <p class="text-sm text-gray-500">Sudah Diproses</p>
                <p class="text-2xl font-bold">{{ $selesai }}</p>
            </div>
        </div>
    </div>

    {{-- ================= TABEL RESEP ================= --}}
    <div class="p-6 bg-white border border-gray-100 shadow-sm rounded-xl">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm divide-y divide-gray-200">
                <thead>
                    <tr class="font-semibold text-left text-gray-500 bg-gray-50">
                        <th class="px-4 py-3">No. Resep</th>
                        <th class="px-4 py-3">Nama Pasien</th>
                        <th class="px-4 py-3">NIK</th>
                        <th class="px-4 py-3">Dokter</th>
                        <th class="px-4 py-3">Tanggal</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($reseps as $r)
                        <tr>
                            <td class="px-4 py-4 font-semibold text-gray-800">
                                RX-{{ $r->id }}
                            </td>
                            <td class="px-4 py-4 font-semibold text-gray-800">
                                {{ $r->medicalRecord->patient->nama }}
                            </td>
                            <td class="px-4 py-4 text-gray-600">
                                {{ $r->medicalRecord->patient->nik ?? '-' }}
                            </td>
                            <td class="px-4 py-4 text-gray-600">
                                {{ $r->medicalRecord->doctor->name }}
                            </td>
                            <td class="px-4 py-4 text-gray-600">
                                {{ $r->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td class="px-4 py-4">
                                <span class="px-2 py-1 text-[11px] font-bold rounded uppercase
                                    {{ $r->status == 'selesai' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                    {{ $r->status == 'selesai' ? 'Sudah Diproses' : 'Belum Diproses' }}
                                </span>
                            </td>
                            <td class="px-4 py-4 text-center">
                                <div class="flex justify-center gap-2">
                                    {{-- 🔥 STATUS BAYAR --}}
                                    @if ($r->payment_status !== 'paid')
                                        <button onclick="bayarResep({{ $r->id }})"
                                            class="px-3 py-1.5 text-xs text-white bg-green-600 rounded-lg hover:bg-green-700">
                                            Bayar
                                        </button>
                                    @else
                                        <span class="px-3 py-1.5 text-xs font-semibold text-green-700 bg-green-100 rounded-lg">
                                            ✔️ Paid
                                        </span>
                                    @endif

                                    <button onclick='openDetail(@json($r))'
                                        class="px-3 py-1.5 text-xs bg-[#2f7f7b] text-white rounded-lg hover:bg-[#23615e]">
                                        <i class="fas fa-eye"></i> Detail
                                    </button>

                                    @if ($r->status == 'belum')
                                        <a href="{{ route('resep.proses', $r->id) }}"
                                            class="px-3 py-1.5 text-xs text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                                            Proses
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-6 text-center text-gray-500">
                                Tidak ada resep masuk
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- ================= MODAL ================= --}}
    <div id="overlay" class="fixed inset-0 z-40 hidden bg-black/40"></div>

    <div id="detailModal" class="fixed inset-0 z-50 items-center justify-center hidden">
        <div class="w-full max-w-xl p-6 bg-white rounded-xl">
            <h2 class="mb-4 text-lg font-bold">Detail Resep</h2>
            <div id="detailContent"></div>
            <div class="mt-6 text-right">
                <button onclick="closeModal()" class="px-4 py-2 bg-gray-300 rounded-lg">Tutup</button>
            </div>
        </div>
    </div>

    {{-- ================= MIDTRANS ================= --}}
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>

    {{-- 🔥 SWEET ALERT --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function openDetail(data) {
            document.getElementById('overlay').classList.remove('hidden');
            document.getElementById('detailModal').classList.remove('hidden');

            let list = '';
            data.items.forEach(i => {
                list += `<li>${i.obat.nama_obat} - ${i.jumlah} ${i.obat.satuan}</li>`;
            });

            document.getElementById('detailContent').innerHTML = `
        <p><b>RX-${data.id}</b></p>
        <ul class="pl-5 mt-3 list-disc">${list}</ul>
    `;
        }

        function closeModal() {
            document.getElementById('overlay').classList.add('hidden');
            document.getElementById('detailModal').classList.add('hidden');
        }

        function bayarResep(id) {

            fetch(`/resep/bayar/${id}`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                })
                .then(res => res.json())
                .then(data => {

                    if (!data.snap_token) {
                        Swal.fire('Error', 'Token tidak didapat', 'error');
                        return;
                    }

                    snap.pay(data.snap_token, {

                        onSuccess: function(result) {

                            fetch(`/resep/payment-success/${id}`, {
                                method: "POST",
                                headers: {
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                }
                            });

                            Swal.fire({
                                icon: 'success',
                                title: 'Pembayaran Berhasil!',
                                text: 'Resep siap diproses',
                            }).then(() => {
                                location.reload();
                            });
                        },

                        onPending: function(result) {
                            Swal.fire('Menunggu', 'Silakan selesaikan pembayaran', 'info');
                        },

                        onError: function(result) {
                            Swal.fire('Gagal', 'Pembayaran gagal', 'error');
                        }

                    });

                })
                .catch(() => {
                    Swal.fire('Error', 'Server error', 'error');
                });
        }
    </script>

@endsection
