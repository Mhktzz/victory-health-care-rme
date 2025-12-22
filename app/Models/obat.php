<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obats';

    protected $fillable = [
    'kode_obat',
    'nama_obat',
    'jenis',
    'satuan',
    'stok_tersedia',
    'stok_minimum',
    'tanggal_kadaluarsa',
];


    protected $dates = ['tanggal_kadaluarsa'];
}
