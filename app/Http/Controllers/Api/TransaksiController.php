<?php

namespace App\Http\Controllers\Api;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\Detail_Transaksi;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with(['user', 'detailTransaksi.produk'])->latest()->get();
        return new ApiResource($transaksi, true, 'Data transaksi berhasil diambil');
    }

    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'tanggal'                          => 'required|date',
        'nama_jenis_pembelian'             => 'required|string|max:255',
        'detail_transaksi'                 => 'required|array|min:1',
        'detail_transaksi.*.Produk_id'     => 'required|exists:produks,id',
        'detail_transaksi.*.qty'           => 'required|integer|min:1',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    DB::beginTransaction();

    try {
        $transaksi = Transaksi::create([
            'User_id' => 1,
            'tanggal' => $request->tanggal,
            'nama_jenis_pembelian' => $request->nama_jenis_pembelian,
            'total_harga' => 0
        ]);

        $total = 0;

        foreach ($request->detail_transaksi as $detail) {

            $produk = Produk::lockForUpdate()->findOrFail($detail['Produk_id']);

            // cek stok
            if ($produk->stok < $detail['qty']) {
                DB::rollBack();
                return response()->json([
                    'message' => 'Stok produk ' . $produk->nama_produk . ' tidak mencukupi'
                ], 400);
            }

            $subtotal = $detail['qty'] * $produk->harga;

            // simpan detail
            Detail_Transaksi::create([
                'Transaksi_id' => $transaksi->id,
                'Produk_id' => $produk->id,
                'qty' => $detail['qty'],
                'subtotal' => $subtotal,
            ]);

            // kurangi stok
            $produk->decrement('stok', $detail['qty']);

            $total += $subtotal;
        }

        // update total sekali saja
        $transaksi->update([
            'total_harga' => $total
        ]);

        DB::commit();

        return new ApiResource(
            $transaksi->load(['user', 'detailTransaksi.produk']),
            true,
            'Transaksi berhasil ditambahkan'
        );

    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json([
            'message' => 'Terjadi kesalahan',
            'error' => $e->getMessage()
        ], 500);
    }
}

public function dashboard()
{
    $totalTransaksi = Transaksi::count();
    $totalProduk = Produk::count();
    $totalPenjualan = Transaksi::sum('total_harga');

    return response()->json([
        'total_transaksi' => $totalTransaksi,
        'total_produk' => $totalProduk,
        'total_penjualan' => $totalPenjualan
    ]);
}

    public function show($id)
    {
        $transaksi = Transaksi::with(['user', 'detailTransaksi.produk'])
                        ->findOrFail($id);

        return new ApiResource($transaksi, true, 'Data transaksi berhasil diambil');
    }
}
