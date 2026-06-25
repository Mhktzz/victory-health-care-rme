<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();

            // pasien
            $table->foreignId('patient_id')
                ->constrained()
                ->cascadeOnDelete();

            // dokter (ambil dari users)
            $table->foreignId('doctor_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('jenis_layanan');

            $table->date('tanggal');
            $table->time('jam');

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
