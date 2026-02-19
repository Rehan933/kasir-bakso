<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('produk', App\Http\Controllers\Api\ProdukController::class);
Route::apiResource('mutasi-stok', App\Http\Controllers\Api\Mutasi_StokController::class);
