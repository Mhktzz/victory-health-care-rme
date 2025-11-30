<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kunjungans', function (Blueprint $table) {
            $table->id('id_kunjungan');
            $table->foreignId('id_pasien')->constrained('pasiens')->onDelete('cascade');
            $table->foreignId('id_dokter')->constrained('users')->onDelete('cascade');
            $table->enum('jenis_kunjungan', ['Rawat Jalan', 'Rawat Inap', 'IGD']);
            $table->string('poli');
            $table->date('tanggal_kunjungan');
            $table->enum('status_kunjungan', ['selesai', 'kontrol', 'dirawat'])->default('dirawat');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kunjungans');
    }
};