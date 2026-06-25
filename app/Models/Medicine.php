<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_obat',
        'nama_obat',
        'jenis',
        'satuan'
    ];

    public function stocks()
    {
        return $this->hasMany(MedicineStock::class);
    }

    public function stock()
    {
        return $this->hasOne(MedicineStock::class)->latestOfMany();
    }

    public function prescriptionItems()
    {
        return $this->hasMany(PrescriptionItem::class);
    }
}
