<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\ObatSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // SUPER ADMIN
        User::create([
            'name' => 'Admin Utama',
            'username' => 'superadmin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'role' => 'super_admin',
            'spesialisasi' => null,
        ]);

        // MANAJER
        User::create([
            'name' => 'Manajer Klinik',
            'username' => 'manajer',
            'email' => 'manajer@example.com',
            'password' => Hash::make('manajer123'),
            'role' => 'manajer',
            'spesialisasi' => null,
        ]);

        // ADMIN PENDAFTARAN
        User::create([
            'name' => 'Admin Pendaftaran',
            'username' => 'pendaftaran',
            'email' => 'pendaftaran@example.com',
            'password' => Hash::make('daftar123'),
            'role' => 'pendaftaran',
            'spesialisasi' => null,
        ]);

        // DOKTER
        User::create([
            'name' => 'Dr. Budi',
            'username' => 'drbudi',
            'email' => 'dokter@example.com',
            'password' => Hash::make('dokter123'),
            'role' => 'dokter',
            'spesialisasi' => 'Poli Umum',
        ]);

        // PERAWAT
        User::create([
            'name' => 'Siti',
            'username' => 'siti_perawat',
            'email' => 'perawat@example.com',
            'password' => Hash::make('perawat123'),
            'role' => 'perawat',
            'spesialisasi' => null,
        ]);
        // APOTEKER
        User::create([
            'name' => 'Apoteker Andi',
            'username' => 'apoteker',
            'email' => 'apoteker@example.com',
            'password' => Hash::make('apoteker123'),
            'role' => 'apoteker',
            'spesialisasi' => null,
        ]);
    }
}
