<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        // SAMPLE PATIENT for dokter queue
        Patient::create([
            'nik' => '3210012345678901',
            'no_rm' => 'RM0001',
            'nama' => 'Joko Widodo',
            'tanggal_lahir' => '1977-06-21',
            'jenis_kelamin' => 'L',
            'telepon' => '081234567890',
            'status_pasien' => 'lama',
        ]);

        Patient::create([
            'nik' => '3210012345678998',
            'no_rm' => 'RM0002',
            'nama' => 'Arid Budiman',
            'tanggal_lahir' => '2005-06-21',
            'jenis_kelamin' => 'L',
            'telepon' => '081234567891011',
            'status_pasien' => 'lama',
        ]);
    }
}
