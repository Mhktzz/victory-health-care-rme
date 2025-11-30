<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tugas_perawats', function (Blueprint $table) {
            $table->id('id_tugas');
            $table->foreignId('id_rekam_medis')->constrained('rekam_medis')->onDelete('cascade');
            $table->foreignId('id_perawat')->constrained('users')->onDelete('cascade');
            $table->text('deskripsi_tugas');
            $table->enum('status_tugas', ['pending', 'selesai'])->default('pending');
            $table->date('tanggal_ditugaskan');
            $table->date('tanggal_selesai')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tugas_perawats');
    }
};