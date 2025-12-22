<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    // WAJIB karena tabel tidak plural
    protected $table = 'layanan';

    protected $fillable = [
        'kode_layanan',
        'kategori',
        'nama_layanan',
        'tarif',
        'deskripsi',
    ];
}
