<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('riwayat_obat_items', function (Blueprint $table) {
            $table->id();

            // TANPA FK (AMAN)
            $table->unsignedBigInteger('riwayat_obat_id')->nullable();
            $table->unsignedBigInteger('obat_id')->nullable();

            $table->integer('jumlah')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_obat_items');
    }
};
