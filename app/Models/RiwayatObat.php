<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatObat extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_resep',
        'pasien_id',
        'dokter_id',
        'tanggal'
    ];

    protected $casts = [
        'tanggal' => 'datetime'
    ];

    public function items()
    {
        return $this->hasMany(RiwayatObatItem::class);
    }
}
