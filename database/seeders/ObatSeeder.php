<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Obat;

class ObatSeeder extends Seeder
{
    public function run(): void
    {
        Obat::insert([
            [
                'kode_obat' => 'PAR500',
                'nama_obat' => 'Paracetamol 500mg',
                'jenis' => 'Tablet',
                'satuan' => 'Strip',
                'stok_tersedia' => 150,
                'stok_minimum' => 20,
                'tanggal_kadaluarsa' => '2025-06-30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_obat' => 'AMX500',
                'nama_obat' => 'Amoxicillin 500mg',
                'jenis' => 'Kapsul',
                'satuan' => 'Strip',
                'stok_tersedia' => 80,
                'stok_minimum' => 30,
                'tanggal_kadaluarsa' => '2025-08-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_obat' => 'OBH100',
                'nama_obat' => 'OBH Sirup',
                'jenis' => 'Sirup',
                'satuan' => 'Botol',
                'stok_tersedia' => 45,
                'stok_minimum' => 20,
                'tanggal_kadaluarsa' => '2025-12-31',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_obat' => 'ANT100',
                'nama_obat' => 'Antasida DOEN',
                'jenis' => 'Tablet',
                'satuan' => 'Strip',
                'stok_tersedia' => 12, //  stok menipis
                'stok_minimum' => 20,
                'tanggal_kadaluarsa' => '2025-03-20', //  kadaluarsa
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
