<h2 class="mb-4 text-xl font-bold">Invoice Resep</h2>

<p><strong>No Resep:</strong> {{ $resep['no'] }}</p>
<p><strong>Pasien:</strong> {{ $resep['pasien'] }}</p>

<table class="w-full mt-4 border">
    <tr class="bg-gray-100">
        <th class="p-2">Obat</th>
        <th class="p-2">Harga</th>
    </tr>
    @foreach ($resep['obat'] as $o)
        <tr>
            <td class="p-2">{{ $o['nama'] }}</td>
            <td class="p-2">Rp {{ number_format($o['harga']) }}</td>
        </tr>
    @endforeach
</table>

<p class="mt-4 font-bold">Total: Rp {{ number_format($total) }}</p>

@if ($resep['status'] == 'belum')
    <button id="pay-button" class="px-4 py-2 mt-4 text-white bg-green-600 rounded-lg">
        Bayar (QRIS / E-Wallet)
    </button>
@else
    <div class="mt-4 font-bold text-green-600">
        ✅ Sudah Dibayar
    </div>

    <button onclick="window.print()" class="px-4 py-2 mt-2 text-white bg-blue-600 rounded-lg">
        Cetak Invoice
    </button>
@endif


<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

<script>
    document.getElementById('pay-button')?.addEventListener('click', function() {
        snap.pay('{{ $snapToken }}', {

            onSuccess: function(result) {
                alert("Pembayaran berhasil!");

                // redirect ke halaman resep
                window.location.href = "/dashboard/apoteker/resep";
            },

            onPending: function(result) {
                alert("Menunggu pembayaran (QRIS tampil)");
            },

            onError: function(result) {
                alert("Pembayaran gagal");
            }
        });
    });
</script>
