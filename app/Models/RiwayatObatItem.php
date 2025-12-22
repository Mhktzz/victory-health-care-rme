<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatObatItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'riwayat_obat_id',
        'obat_id',
        'jumlah'
    ];

    public function riwayat()
    {
        return $this->belongsTo(RiwayatObat::class, 'riwayat_obat_id');
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
}
