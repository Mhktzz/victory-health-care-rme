<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// landing
Route::get('/', function () {
    return view('landingpage');
})->name('landing');

// login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');

// register (POST ONLY)
Route::post('/register', [AuthController::class, 'registerProcess'])->name('register.process');

