<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->apiResource('produk', App\Http\Controllers\Api\ProdukController::class);
Route::middleware('auth:sanctum')->apiResource('mutasi-stok', App\Http\Controllers\Api\Mutasi_StokController::class);
Route::middleware('auth:sanctum')->apiResource('jenis-pembelian', App\Http\Controllers\Api\Jenis_PembelianController::class);
Route::middleware('auth:sanctum')->apiResource('transaksi', App\Http\Controllers\Api\TransaksiController::class);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
