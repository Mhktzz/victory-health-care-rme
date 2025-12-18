<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\Icd10Controller;
use App\Http\Controllers\reservationController;
use App\Http\Controllers\PatientController;
Route::get('/', function () {
    return view('landingpage');
})->name('landing');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'role:super_admin'])->group(function () {

    Route::get('/dashboard/superadmin', function () {
        return view('dashboard.superadmin.dashboard');
    })->name('dashboard.superadmin');


    Route::get(
        '/dashboard/superadmin/kelola-user',
        [UserController::class, 'kelolauser']
    )->name('dashboard.superadmin.kelolauser');

    Route::get(
        '/dashboard/superadmin/user/create',
        [UserController::class, 'create']
    )->name('dashboard.superadmin.user.create');

    Route::post(
        '/dashboard/superadmin/user',
        [UserController::class, 'store']
    )->name('dashboard.superadmin.user.store');

    Route::get(
        '/dashboard/superadmin/user/{user}',
        [UserController::class, 'show']
    )->name('dashboard.superadmin.user.show');

    Route::get(
        '/dashboard/superadmin/user/{user}/edit',
        [UserController::class, 'edit']
    )->name('dashboard.superadmin.user.edit');

    Route::put(
        '/dashboard/superadmin/user/{user}',
        [UserController::class, 'update']
    )->name('dashboard.superadmin.user.update');

    Route::delete(
        '/dashboard/superadmin/user/{user}',
        [UserController::class, 'destroy']
    )->name('dashboard.superadmin.user.destroy');


    Route::get('/dashboard/superadmin/rekam-medis', function () {
        return view('dashboard.superadmin.rekammedis');
    })->name('dashboard.superadmin.rekammedis');

    Route::get('/dashboard/superadmin/data-pasien', function () {
        return view('dashboard.superadmin.datapasien');
    })->name('dashboard.superadmin.datapasien');


    Route::get(
        '/dashboard/superadmin/obat',
        [MedicineController::class, 'index']
    )->name('superadmin.obat.index');

    Route::get(
        '/dashboard/superadmin/obat/create',
        [MedicineController::class, 'create']
    )->name('superadmin.obat.create');

    Route::post(
        '/dashboard/superadmin/obat',
        [MedicineController::class, 'store']
    )->name('superadmin.obat.store');

    Route::get(
        '/dashboard/superadmin/obat/{medicine}/edit',
        [MedicineController::class, 'edit']
    )->name('superadmin.obat.edit');

    Route::put(
        '/dashboard/superadmin/obat/{medicine}',
        [MedicineController::class, 'update']
    )->name('superadmin.obat.update');

    Route::delete(
        '/dashboard/superadmin/obat/{medicine}',
        [MedicineController::class, 'destroy']
    )->name('superadmin.obat.destroy');

     Route::get('/dashboard/superadmin/obat/stok',
        [MedicineController::class, 'stok']
    )->name('superadmin.obat.stok');


    Route::get(
        '/dashboard/superadmin/master-icd10',
        [Icd10Controller::class, 'index']
    )->name('dashboard.superadmin.icd10.index');

    Route::get(
        '/dashboard/superadmin/master-icd10/create',
        [Icd10Controller::class, 'create']
    )->name('dashboard.superadmin.icd10.create');

    Route::post(
        '/dashboard/superadmin/master-icd10',
        [Icd10Controller::class, 'store']
    )->name('dashboard.superadmin.icd10.store');

    Route::get(
        '/dashboard/superadmin/master-icd10/{icd10}',
        [Icd10Controller::class, 'show']
    )->name('dashboard.superadmin.icd10.show');

    Route::get(
        '/dashboard/superadmin/master-icd10/{icd10}/edit',
        [Icd10Controller::class, 'edit']
    )->name('dashboard.superadmin.icd10.edit');

    Route::put(
        '/dashboard/superadmin/master-icd10/{icd10}',
        [Icd10Controller::class, 'update']
    )->name('dashboard.superadmin.icd10.update');

    Route::delete(
        '/dashboard/superadmin/master-icd10/{icd10}',
        [Icd10Controller::class, 'destroy']
    )->name('dashboard.superadmin.icd10.destroy');
});


Route::middleware(['auth', 'role:manajer'])->group(function () {
    Route::get('/dashboard/manajer', function () {
        return view('dashboard.manajer.index');
    })->name('dashboard.manajer');
});

Route::middleware(['auth', 'role:pendaftaran'])->group(function () {

       // INDEX
    Route::get(
        '/dashboard/pendaftaran/reservasi/index',
        [ReservationController::class, 'index']
    )->name('dashboard.pendaftaran.reservasi.index');

    // CREATE
    Route::get(
        '/dashboard/pendaftaran/reservasi/create',
        [ReservationController::class, 'create']
    )->name('dashboard.pendaftaran.reservasi.create');

    // STORE
    Route::post(
        '/dashboard/pendaftaran/reservasi/store',
        [ReservationController::class, 'store']
    )->name('dashboard.pendaftaran.reservasi.store');

    // SHOW (VIEW)
    Route::get(
        '/dashboard/pendaftaran/reservasi/{reservasi}',
        [ReservationController::class, 'show']
    )->name('dashboard.pendaftaran.reservasi.view');

    // EDIT
    Route::get(
        '/dashboard/pendaftaran/reservasi/{reservasi}/edit',
        [ReservationController::class, 'edit']
    )->name('dashboard.pendaftaran.reservasi.edit');

    // UPDATE
    Route::put(
        '/dashboard/pendaftaran/reservasi/{reservasi}',
        [ReservationController::class, 'update']
    )->name('dashboard.pendaftaran.reservasi.update');

    // DELETE
    Route::delete(
        '/dashboard/pendaftaran/reservasi/{reservasi}',
        [ReservationController::class, 'destroy']
    )->name('dashboard.pendaftaran.reservasi.destroy');

        Route::get('/patient', [PatientController::class, 'index'])
            ->name('dashboard.pendaftaran.patient');

});


Route::middleware(['auth', 'role:perawat'])->group(function () {
    Route::get('/dashboard/perawat', function () {
        return view('dashboard.perawat.index');
    })->name('dashboard.perawat');
});

Route::middleware(['auth', 'role:dokter'])->group(function () {
    Route::get('/dashboard/dokter', function () {
        return view('dashboard.dokter.index');
    })->name('dashboard.dokter');
});

Route::middleware(['auth', 'role:apoteker'])->group(function () {
    Route::get('/dashboard/apoteker', function () {
        return view('dashboard.apoteker.index');
    })->name('dashboard.apoteker');
});