<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();

            // Gabungan nama pasien + NIK
            $table->string('pasien_identitas');

            // Detail reservasi
            $table->string('jenis_layanan');
            $table->string('dokter');
            $table->date('tanggal');
            $table->time('jam');

            // Keluhan pasien
            $table->text('keluhan')->nullable();

            $table->string('status')->default('menunggu');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
