<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RiwayatObatSeeder extends Seeder
{
    public function run(): void
    {
        $obatId = DB::table('obats')->value('id');

        if (!$obatId) {
            return;
        }

        $riwayatId = DB::table('riwayat_obats')->insertGetId([
            'pasien_id' => null,
            'dokter_id' => null,
            'tanggal'   => now(),
            'no_resep'  => 'RSP-' . rand(1000,9999),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('riwayat_obat_items')->insert([
            'riwayat_obat_id' => $riwayatId,
            'obat_id' => $obatId,
            'jumlah' => rand(1,5),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
