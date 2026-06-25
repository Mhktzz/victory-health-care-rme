<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('prescription_items', function (Blueprint $table) {
            $table->dropConstrainedForeignId('medicine_id');
            $table->foreignId('medicine_id')
                ->constrained('medicines')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('prescription_items', function (Blueprint $table) {
            $table->dropConstrainedForeignId('medicine_id');
            $table->foreignId('medicine_id')
                ->constrained('obats')
                ->cascadeOnDelete();
        });
    }
};
