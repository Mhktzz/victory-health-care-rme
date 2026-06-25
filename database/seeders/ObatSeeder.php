<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Obat;
use App\Models\MedicineStock;

class ObatSeeder extends Seeder
{
    public function run(): void
    {
        $medicines = [
            [
                'kode_obat' => 'PAR500',
                'nama_obat' => 'Paracetamol 500mg',
                'jenis' => 'Tablet',
                'satuan' => 'Strip',
                'stok_tersedia' => 150,
                'stok_minimum' => 20,
                'tanggal_kadaluarsa' => '2025-06-30',
            ],
            [
                'kode_obat' => 'AMX500',
                'nama_obat' => 'Amoxicillin 500mg',
                'jenis' => 'Kapsul',
                'satuan' => 'Strip',
                'stok_tersedia' => 80,
                'stok_minimum' => 30,
                'tanggal_kadaluarsa' => '2025-08-15',
            ],
            [
                'kode_obat' => 'OBH100',
                'nama_obat' => 'OBH Sirup',
                'jenis' => 'Sirup',
                'satuan' => 'Botol',
                'stok_tersedia' => 45,
                'stok_minimum' => 20,
                'tanggal_kadaluarsa' => '2025-12-31',
            ],
            [
                'kode_obat' => 'ANT100',
                'nama_obat' => 'Antasida DOEN',
                'jenis' => 'Tablet',
                'satuan' => 'Strip',
                'stok_tersedia' => 12,
                'stok_minimum' => 20,
                'tanggal_kadaluarsa' => '2025-03-20',
            ],
        ];

        foreach ($medicines as $item) {
            $obat = Obat::create([
                'kode_obat' => $item['kode_obat'],
                'nama_obat' => $item['nama_obat'],
                'jenis' => $item['jenis'],
                'satuan' => $item['satuan'],
            ]);

            MedicineStock::create([
                'medicine_id' => $obat->id,
                'stok' => $item['stok_tersedia'],
                'stok_minimum' => $item['stok_minimum'],
                'tanggal_kadaluarsa' => $item['tanggal_kadaluarsa'],
            ]);
        }
    }
}
