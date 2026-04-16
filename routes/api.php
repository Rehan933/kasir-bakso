<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('produk', App\Http\Controllers\Api\ProdukController::class);
Route::apiResource('mutasi-stok', App\Http\Controllers\Api\Mutasi_StokController::class);
Route::apiResource('jenis-pembelian', App\Http\Controllers\Api\Jenis_PembelianController::class);
Route::apiResource('transaksi', App\Http\Controllers\Api\TransaksiController::class);
Route::get('/dashboard', [App\Http\Controllers\Api\TransaksiController::class, 'dashboard']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
