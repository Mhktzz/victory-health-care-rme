<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// LANDING PAGE (Ditempatkan di root path '/')
Route::get('/', function () {
    return view('landingpage');
})->name('landing');

// LOGIN
// Route untuk menampilkan form login di path '/login'
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
// Route untuk memproses form login (POST) di path '/login'
Route::post('/login', [AuthController::class, 'login'])->name('login.process');