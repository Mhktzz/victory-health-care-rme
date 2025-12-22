<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\Icd10Controller;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PerformadokterController;
use App\Http\Controllers\PerawatController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\RiwayatObatController;

/*
|--------------------------------------------------------------------------
| LANDING & AUTH
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('landingpage');
})->name('landing');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| SUPER ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:super_admin'])->group(function () {

    Route::get('/dashboard/superadmin', function () {
        return view('dashboard.superadmin.dashboard');
    })->name('dashboard.superadmin');

    Route::get('/dashboard/superadmin/kelola-user', [UserController::class, 'kelolauser'])
        ->name('dashboard.superadmin.kelolauser');

    Route::resource('/dashboard/superadmin/user', UserController::class)
        ->names([
            'index' => 'dashboard.superadmin.user.index',
            'create' => 'dashboard.superadmin.user.create',
            'store' => 'dashboard.superadmin.user.store',
            'show' => 'dashboard.superadmin.user.show',
            'edit' => 'dashboard.superadmin.user.edit',
            'update' => 'dashboard.superadmin.user.update',
            'destroy' => 'dashboard.superadmin.user.destroy',
        ]);

    Route::resource('/dashboard/superadmin/obat', MedicineController::class)
        ->names([
            'index' => 'superadmin.obat.index',
            'create' => 'superadmin.obat.create',
            'store' => 'superadmin.obat.store',
            'edit' => 'superadmin.obat.edit',
            'update' => 'superadmin.obat.update',
            'destroy' => 'superadmin.obat.destroy',
        ]);

    Route::get('/dashboard/superadmin/obat/stok', [MedicineController::class, 'stok'])
        ->name('superadmin.obat.stok');

    Route::resource('/dashboard/superadmin/master-icd10', Icd10Controller::class)
        ->names('dashboard.superadmin.icd10');

    Route::resource('/dashboard/superadmin/layanan', LayananController::class)
        ->names('dashboard.superadmin.layanan');

    Route::resource('/dashboard/superadmin/data-pasien', PatientController::class)
        ->names('dashboard.superadmin.datapasien');
});

/*
|--------------------------------------------------------------------------
| MANAJER
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:manajer'])->group(function () {

    Route::get('/dashboard/manajer', function () {
        return view('dashboard.manajer.index');
    })->name('dashboard.manajer');

    Route::get('/dashboard/manajer/datapasien', [PatientController::class, 'indexManajer'])
        ->name('dashboard.manajer.datapasien.index');

    Route::resource('/dashboard/manajer/layanan', LayananController::class)
        ->names('dashboard.manajer.layanan');

    Route::get('/dashboard/manajer/performadokter', [PerformadokterController::class, 'index'])
        ->name('dashboard.manajer.performadokter.index');
});

/*
|--------------------------------------------------------------------------
| PENDAFTARAN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:pendaftaran'])->group(function () {

    Route::resource(
        '/dashboard/pendaftaran/reservasi',
        ReservationController::class
    )->names('dashboard.pendaftaran.reservasi');

    Route::get('/patient', [PatientController::class, 'index'])
        ->name('dashboard.pendaftaran.patient');
});

/*
|--------------------------------------------------------------------------
| PERAWAT
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:perawat'])->group(function () {

    Route::get('/dashboard/perawat', [PerawatController::class, 'index'])
        ->name('dashboard.perawat');

    Route::get('/dashboard/perawat/periksa/{id}', [PerawatController::class, 'create'])
        ->name('dashboard.perawat.periksa');

    Route::post('/dashboard/perawat/store', [PerawatController::class, 'store'])
        ->name('dashboard.perawat.store');

    Route::get('/dashboard/perawat/antrianpemeriksaanawal', [PerawatController::class, 'antrian'])
        ->name('dashboard.perawat.antrianpemeriksaanawal');
});

/*
|--------------------------------------------------------------------------
| DOKTER
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:dokter'])->group(function () {
    Route::get('/dashboard/dokter', function () {
        return view('dashboard.dokter.index');
    })->name('dashboard.dokter');
});

/*
|--------------------------------------------------------------------------
| APOTEKER 
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:apoteker'])->group(function () {

    Route::get('/dashboard/apoteker', function () {
        return view('dashboard.apoteker.index');
    })->name('dashboard.apoteker');

    Route::get('/dashboard/apoteker/resep', function () {
        return view('dashboard.apoteker.resep');
    })->name('dashboard.apoteker.resep');

    // ===== STOK OBAT (CRUD) =====
    Route::get('/dashboard/apoteker/stok-obat', [ObatController::class, 'index'])
        ->name('dashboard.apoteker.stok.obat');

    Route::post('/dashboard/apoteker/stok-obat', [ObatController::class, 'store'])
        ->name('dashboard.apoteker.stok.store');

    Route::put('/dashboard/apoteker/stok-obat/{obat}', [ObatController::class, 'update'])
        ->name('dashboard.apoteker.stok.update');

    Route::delete('/dashboard/apoteker/stok-obat/{obat}', [ObatController::class, 'destroy'])
        ->name('dashboard.apoteker.stok.destroy');

    Route::get('/dashboard/apoteker/riwayat', function () {
        return view('dashboard.apoteker.riwayat');
    })->name('dashboard.apoteker.riwayat');

    

    Route::middleware(['auth', 'role:apoteker'])->group(function () {
    Route::get(
        '/dashboard/apoteker/riwayat',
        [RiwayatObatController::class, 'index']
    )->name('dashboard.apoteker.riwayat');
});

});
