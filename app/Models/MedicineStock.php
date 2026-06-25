<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineStock extends Model
{
    use HasFactory;

    protected $fillable = [
        'medicine_id',
        'stok',
        'stok_minimum',
        'tanggal_kadaluarsa'
    ];

    protected $dates = ['tanggal_kadaluarsa'];

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
