<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
        'spesialisasi',
        'nomor_pegawai',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    // Auto-generate nomor pegawai berdasarkan role
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {

            // Tentukan prefix berdasarkan role
            $prefix = match ($user->role) {
                'admin' => 'PGW',
                'dokter' => 'DKTR',
                'perawat' => 'PRWT',
                default => 'USR',
            };

            // Ambil user terakhir dengan prefix yang sama
            $lastUser = User::where('nomor_pegawai', 'like', $prefix . '%')
                ->orderBy('id', 'desc')
                ->first();

            // Tentukan nomor urut berikutnya
            $nextNumber = 1;
            if ($lastUser) {
                $lastNumber = intval(substr($lastUser->nomor_pegawai, strlen($prefix) + 1));
                $nextNumber = $lastNumber + 1;
            }

            // Generate nomor pegawai
            $user->nomor_pegawai = $prefix . '-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        });
    }
}
