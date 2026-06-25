<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'medical_record_id',
        'dokter_id',
        'status',
        'snap_token',
        'payment_status'
    ];
    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class);
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'dokter_id');
    }

    public function items()
    {
        return $this->hasMany(PrescriptionItem::class);
    }
}
