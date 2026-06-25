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
use App\Http\Controllers\DokterController;
use App\Http\Controllers\InvoiceController;
use App\http\Controllers\PendaftaranController;
use App\Http\Controllers\ManajemenPasienController;
use App\Http\Controllers\StatusKunjunganController;

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

    Route::get('/dashboard/superadmin/rekam-medis', function () {
        return view('dashboard.superadmin.rekammedis');
    })->name('dashboard.superadmin.rekammedis');

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

    Route::get(
        '/dashboard/superadmin/obat/stok',
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

    Route::get(
        '/dashboard/superadmin/layanan',
        [LayananController::class, 'indexSuperadmin']
    )->name('dashboard.superadmin.layanan.index');

    Route::get(
        '/dashboard/superadmin/layanan/create',
        [LayananController::class, 'create']
    )->name('dashboard.superadmin.layanan.create');

    Route::post(
        '/dashboard/superadmin/layanan',
        [LayananController::class, 'store']
    )->name('dashboard.superadmin.layanan.store');

    Route::get(
        '/dashboard/superadmin/layanan/{layanan}',
        [LayananController::class, 'showSuperadmin']
    )->name('dashboard.superadmin.layanan.show');

    Route::get(
        '/dashboard/superadmin/layanan/{layanan}/edit',
        [LayananController::class, 'edit']
    )->name('dashboard.superadmin.layanan.edit');

    Route::put(
        '/dashboard/superadmin/layanan/{layanan}',
        [LayananController::class, 'update']
    )->name('dashboard.superadmin.layanan.update');

    Route::delete(
        '/dashboard/superadmin/layanan/{layanan}',
        [LayananController::class, 'destroy']
    )->name('dashboard.superadmin.layanan.destroy');


    Route::get(
        '/dashboard/superadmin/data-pasien',
        [PatientController::class, 'indexSuperadmin']
    )->name('dashboard.superadmin.datapasien.index');

    Route::get(
        '/dashboard/superadmin/data-pasien/create',
        [PatientController::class, 'create']
    )->name('dashboard.superadmin.datapasien.create');

    Route::post(
        '/dashboard/superadmin/data-pasien',
        [PatientController::class, 'store']
    )->name('dashboard.superadmin.datapasien.store');

    Route::get(
        '/dashboard/superadmin/data-pasien/{patient}',
        [PatientController::class, 'showSuperadmin']
    )->name('dashboard.superadmin.datapasien.show');

    Route::get(
        '/dashboard/superadmin/data-pasien/{patient}/edit',
        [PatientController::class, 'edit']
    )->name('dashboard.superadmin.datapasien.edit');

    Route::put(
        '/dashboard/superadmin/data-pasien/{patient}',
        [PatientController::class, 'update']
    )->name('dashboard.superadmin.datapasien.update');

    Route::delete(
        '/dashboard/superadmin/data-pasien/{patient}',
        [PatientController::class, 'destroy']
    )->name('dashboard.superadmin.datapasien.destroy');
});

// MANAGERR

Route::middleware(['auth', 'role:manajer'])->group(function () {

    Route::get('/dashboard/manajer', function () {
        return view('dashboard.manajer.index');
    })->name('dashboard.manajer');

    Route::get('/dashboard/manajer/datapasien', [PatientController::class, 'indexManajer'])->name('dashboard.manajer.datapasien.index');

    Route::get(
        '/dashboard/manajer/datapasien/{patient}',
        [PatientController::class, 'showManajer']
    )->name('dashboard.manajer.datapasien.show');

    Route::get(
        '/dashboard/manajer/layanan',
        [LayananController::class, 'indexManajer']
    )->name('dashboard.manajer.layanan.index');

    Route::get(
        '/dashboard/manajer/layanan/create',
        [LayananController::class, 'create']
    )->name('dashboard.manajer.layanan.create');

    Route::post(
        '/dashboard/manajer/layanan',
        [LayananController::class, 'store']
    )->name('dashboard.manajer.layanan.store');

    Route::get(
        '/dashboard/manajer/layanan/{layanan}',
        [LayananController::class, 'showManajer']
    )->name('dashboard.manajer.layanan.show');

    Route::get(
        '/dashboard/manajer/layanan/{layanan}/edit',
        [LayananController::class, 'edit']
    )->name('dashboard.manajer.layanan.edit');


    Route::put(
        '/dashboard/manajer/layanan/{layanan}',
        [LayananController::class, 'update']
    )->name('dashboard.manajer.layanan.update');

    Route::delete(
        '/dashboard/manajer/layanan/{layanan}',
        [LayananController::class, 'destroy']
    )->name('dashboard.manajer.layanan.destroy');
    Route::get('/dashboard/manajer/performadokter', [PerformadokterController::class, 'index'])
        ->name('dashboard.manajer.performadokter.index');
});

/*
|--------------------------------------------------------------------------
| PENDAFTARAN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:pendaftaran'])->group(function () {
    Route::get(
        '/dashboard/pendaftaran/StatusKunjungan/index',
        [ManajemenPasienController::class, 'index']
    )->name('dashboard.pendaftaran.StatusKunjungan.index');



    Route::get(
        '/dashboard/pendaftaran/ManajemenPasien/index',
        [ManajemenPasienController::class, 'index']
    )->name('dashboard.pendaftaran.ManajemenPasien.index');

    Route::get(
        '/dashboard/pendaftaran/ManajemenPasien/create',
        [ManajemenPasienController::class, 'create']
    )->name('dashboard.pendaftaran.ManajemenPasien.create');

    Route::post(
        '/dashboard/pendaftaran/ManajemenPasien',
        [ManajemenPasienController::class, 'store']
    )->name('dashboard.pendaftaran.ManajemenPasien.store');

    Route::get(
        '/dashboard/pendaftaran/ManajemenPasien/edit/{patient}',
        [ManajemenPasienController::class, 'edit']
    )->name('dashboard.pendaftaran.ManajemenPasien.edit');

    Route::put(
        '/dashboard/pendaftaran/ManajemenPasien/{patient}',
        [ManajemenPasienController::class, 'update']
    )->name('dashboard.pendaftaran.ManajemenPasien.update');

    Route::get(
        '/dashboard/pendaftaran/ManajemenPasien/show/{patient}',
        [ManajemenPasienController::class, 'showManajemenPasien']
    )->name('dashboard.pendaftaran.ManajemenPasien.show');

    Route::delete(
        '/dashboard/pendaftaran/ManajemenPasien/{patient}',
        [ManajemenPasienController::class, 'destroy']
    )->name('dashboard.pendaftaran.ManajemenPasien.destroy');
    Route::get('dashboard/pendaftaran/ManajemenPasien', [ManajemenPasienController::class, 'index'])
        ->name('dashboard.pendaftaran.ManajemenPasien');


    Route::get(
        '/dashboard/pendaftaran/reservasi/index',
        [ReservationController::class, 'index']
    )->name('dashboard.pendaftaran.reservasi.index');


    Route::get(
        '/dashboard/pendaftaran/reservasi/create',
        [ReservationController::class, 'create']
    )->name('dashboard.pendaftaran.reservasi.create');

    // STORE
    Route::post(
        '/dashboard/pendaftaran/reservasi/store',
        [ReservationController::class, 'store']
    )->name('dashboard.pendaftaran.reservasi.store');


    Route::get(
        '/dashboard/pendaftaran/reservasi/{reservasi}',
        [ReservationController::class, 'show']
    )->name('dashboard.pendaftaran.reservasi.view');


    Route::get(
        '/dashboard/pendaftaran/reservasi/{reservasi}/edit',
        [ReservationController::class, 'edit']
    )->name('dashboard.pendaftaran.reservasi.edit');


    Route::put(
        '/dashboard/pendaftaran/reservasi/{reservasi}',
        [ReservationController::class, 'update']
    )->name('dashboard.pendaftaran.reservasi.update');


    Route::delete(
        '/dashboard/pendaftaran/reservasi/{reservasi}',
        [ReservationController::class, 'destroy']
    )->name('dashboard.pendaftaran.reservasi.destroy');

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
    Route::get('/dashboard/dokter', [App\Http\Controllers\DokterController::class, 'index'])->name('dashboard.dokter');

    // Antrian dokter
    Route::get('/dashboard/dokter/antrian', [DokterController::class, 'queue'])->name('dashboard.dokter.queue');
    Route::post('/dashboard/dokter/antrian/{patient}/panggil', [DokterController::class, 'callPatient'])->name('dashboard.dokter.call');

    // Rekam medis
    Route::get('/dashboard/dokter/rekam-medis/{id}', [DokterController::class, 'record'])->name('dashboard.dokter.record');
    Route::post('/dashboard/dokter/rekam-medis/{id}', [DokterController::class, 'storeRecord'])->name('dashboard.dokter.record.store');
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

    Route::get('/dashboard/apoteker/resep', [ObatController::class, 'resepMasuk'])
        ->name('dashboard.apoteker.resep');

    Route::get('/resep/proses/{id}', [ObatController::class, 'prosesResep'])
        ->name('resep.proses');

    // ===== STOK OBAT (CRUD) =====
    Route::get('/dashboard/apoteker/stok-obat', [ObatController::class, 'index'])
        ->name('dashboard.apoteker.stok.obat');

    Route::post('/dashboard/apoteker/stok-obat', [ObatController::class, 'store'])
        ->name('dashboard.apoteker.stok.store');

    Route::put('/dashboard/apoteker/stok-obat/{obat}', [ObatController::class, 'update'])
        ->name('dashboard.apoteker.stok.update');

    Route::delete('/dashboard/apoteker/stok-obat/{obat}', [ObatController::class, 'destroy'])
        ->name('dashboard.apoteker.stok.destroy');

    Route::get('/dashboard/apoteker/riwayat', [RiwayatObatController::class, 'index'])
        ->name('dashboard.apoteker.riwayat');



    Route::middleware(['auth', 'role:apoteker'])->group(function () {
        Route::get(
            '/dashboard/apoteker/riwayat',
            [RiwayatObatController::class, 'index']
        )->name('dashboard.apoteker.riwayat');
    });

    Route::post('/resep/bayar/{id}', [ObatController::class, 'bayar'])
        ->name('resep.bayar');

    Route::post('/resep/payment-success/{id}', [ObatController::class, 'paymentSuccess'])
        ->name('resep.payment.success');

    Route::get('/invoice/{no}', [InvoiceController::class, 'show'])
        ->name('invoice.show');
});

Route::post('/midtrans/notification', [ObatController::class, 'notificationHandler'])
    ->name('midtrans.notification');
