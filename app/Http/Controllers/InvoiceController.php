<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;

class InvoiceController extends Controller
{
    public function show($no)
    {
        // Dummy data
        $resep = [
            'no' => $no,
            'pasien' => 'Agus Prasetyo',
            'status' => 'belum', // penting untuk flow
            'obat' => [
                ['nama' => 'Paracetamol', 'harga' => 10000],
                ['nama' => 'Amoxicillin', 'harga' => 10000],
            ]
        ];

        $total = collect($resep['obat'])->sum('harga');

        // ===== MIDTRANS CONFIG =====
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // ===== PARAMS =====
        $params = [
            'transaction_details' => [
                'order_id' => 'INV-' . $no . '-' . time(),
                'gross_amount' => $total,
            ],
            'customer_details' => [
                'first_name' => $resep['pasien'],
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('dashboard.apoteker.invoice', compact('resep', 'total', 'snapToken'));
    }
}
