<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LayananApiController;



Route::get('/test', function () {
    return response()->json([
        'message' => 'API OK'
    ]);
});


Route::get('/layanan', [LayananApiController::class, 'index']);


Route::post('/tambahlayanan', [LayananApiController::class, 'store']);


Route::get('/layanan/{layanan}', [LayananApiController::class, 'show']);


Route::put('/editlayanan/{layanan}', [LayananApiController::class, 'update']);

Route::delete('/deletelayanan/{layanan}', [LayananApiController::class, 'destroy']);
