<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokterController;

/* LANDING */

Route::get('/', function () {
    return view('landingpage');
})->name('landing');

/* AUTH */
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/* DASHBOARD */
Route::middleware(['auth', 'role:super_admin'])->group(function () {
    Route::get('/dashboard/superadmin', function () {
        return view('dashboard.superadmin.dashboard');
    })->name('dashboard.superadmin');

    Route::get('/dashboard/superadmin/kelola-user', function () {
        return view('dashboard.superadmin.kelolauser');
    })->name('dashboard.superadmin.kelolauser');
});

Route::middleware(['auth', 'role:manajer'])->group(function () {
    Route::get('/dashboard/manajer', function () {
        return view('dashboard.manajer.index');
    })->name('dashboard.manajer');
});

Route::middleware(['auth', 'role:pendaftaran'])->group(function () {
    Route::get('/dashboard/pendaftaran', function () {
        return view('dashboard.pendaftaran.index');
    })->name('dashboard.pendaftaran');
});

Route::middleware(['auth', 'role:perawat'])->group(function () {
    Route::get('/dashboard/perawat', function () {
        return view('dashboard.perawat.index');
    })->name('dashboard.perawat');
});

Route::middleware(['auth', 'role:dokter'])->group(function () {
    Route::get('/dashboard/dokter', [App\Http\Controllers\DokterController::class, 'index'])->name('dashboard.dokter');

    // Antrian dokter
    Route::get('/dashboard/dokter/antrian', [DokterController::class, 'queue'])->name('dashboard.dokter.queue');
    Route::post('/dashboard/dokter/antrian/{patient}/panggil', [DokterController::class, 'callPatient'])->name('dashboard.dokter.call');

    // Rekam medis
    Route::get('/dashboard/dokter/rekam-medis/{id}', [DokterController::class, 'record'])->name('dashboard.dokter.record');
    Route::post('/dashboard/dokter/rekam-medis/{id}', [DokterController::class, 'storeRecord'])->name('dashboard.dokter.record.store');
});

Route::middleware(['auth', 'role:apoteker'])->group(function () {
    Route::get('/dashboard/apoteker', function () {
        return view('dashboard.apoteker.index');
    })->name('dashboard.apoteker');
});
