<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;

    protected $table = 'kunjungans';
    protected $primaryKey = 'id_kunjungan';
    public $timestamps = true;

    protected $fillable = [
        'id_pasien',
        'id_dokter',
        'jenis_kunjungan',
        'poli',
        'tanggal_kunjungan',
        'status_kunjungan'
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id_pasien');
    }

    public function dokter()
    {
        return $this->belongsTo(User::class, 'id_dokter', 'id_user');
    }
}