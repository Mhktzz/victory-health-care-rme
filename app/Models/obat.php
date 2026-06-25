<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'medicines';

    protected $fillable = [
        'kode_obat',
        'nama_obat',
        'jenis',
        'satuan',
    ];

    protected $appends = [
        'stok_tersedia',
        'stok_minimum',
        'tanggal_kadaluarsa',
    ];

    public function stocks()
    {
        return $this->hasMany(MedicineStock::class, 'medicine_id');
    }

    public function stock()
    {
        return $this->hasOne(MedicineStock::class, 'medicine_id')->latestOfMany();
    }

    public function getStokTersediaAttribute()
    {
        return optional($this->stock)->stok ?? 0;
    }

    public function getStokMinimumAttribute()
    {
        return optional($this->stock)->stok_minimum ?? 0;
    }

    public function getTanggalKadaluarsaAttribute()
    {
        return optional($this->stock)->tanggal_kadaluarsa;
    }
}
