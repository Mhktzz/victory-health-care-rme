<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasPerawat extends Model
{
    use HasFactory;

    protected $table = 'tugas_perawats';
    protected $primaryKey = 'id_tugas';
    public $timestamps = true;

    protected $fillable = [
        'id_rekam_medis',
        'id_perawat',
        'deskripsi_tugas',
        'status_tugas',
        'tanggal_ditugaskan',
        'tanggal_selesai'
    ];

    public function perawat()
    {
        return $this->belongsTo(User::class, 'id_perawat', 'id_user');
    }

    public function scopePending($query)
    {
        return $query->where('status_tugas', 'pending');
    }

    public function scopeSelesai($query)
    {
        return $query->where('status_tugas', 'selesai');
    }
}