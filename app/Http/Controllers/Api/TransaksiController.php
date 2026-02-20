<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ApiResource;
use App\Models\Transaksi;
use App\Models\Detail_Transaksi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::all();
        return new ApiResource($transaksi, true, 'Data transaksi berhasil diambil');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal'                          => 'required|date',
            'jenis_pembelian_id'               => 'required|exists:jenis_pembelian,id',
            'detail_transaksi'                 => 'required|array|min:1',
            'detail_transaksi.*.produk_id'     => 'required|exists:produks,id',
            'detail_transaksi.*.qty'           => 'required|integer|min:1',
        ]);
    }

     public function show($id)
     {
         $transaksi = Transaksi::findOrFail($id);
         return new ApiResource($transaksi, true, 'Data transaksi berhasil diambil');
     }
}
