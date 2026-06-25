<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatObat extends Model
{
    use HasFactory;

    protected $table = 'riwayat_obats'; // pastikan sesuai tabel kamu

    protected $fillable = [
        'no_resep',
        'pasien_id',
        'dokter_id',
        'tanggal'
    ];

    protected $casts = [
        'tanggal' => 'datetime'
    ];

    // 🔥 RELASI PASIEN
    public function pasien()
    {
        return $this->belongsTo(\App\Models\Patient::class, 'pasien_id');
    }

    // 🔥 RELASI DOKTER
    public function dokter()
    {
        return $this->belongsTo(\App\Models\User::class, 'dokter_id');
    }

    // 🔥 RELASI ITEM
    public function items()
    {
        return $this->hasMany(RiwayatObatItem::class, 'riwayat_obat_id');
    }
}
