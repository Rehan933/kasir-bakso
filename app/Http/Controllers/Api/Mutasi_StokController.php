<?php

namespace App\Http\Controllers\Api;

use App\Models\Produk;
use App\Models\Mutasi_Stok;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ApiResource;

class Mutasi_StokController extends Controller
{
    public function index()
    {
        $mutasi_stok = Mutasi_Stok::all();
        return new ApiResource($mutasi_stok, true, 'Data mutasi stok berhasil diambil');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'Produk_id' => 'required|exists:produks,id',
            'qty' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        try {
            DB::beginTransaction();


            $produk = Produk::findOrFail($request->Produk_id);


            if ($produk->stok < $request->qty) {
                return new ApiResource(null, false, 'Stok tidak mencukupi');
            }


            $sisa = $produk->stok - $request->qty;


            $produk->update([
                'stok' => $sisa
            ]);


            $mutasi_stok = Mutasi_Stok::create([
                'Produk_id' => $produk->id,
                'qty' => $request->qty,
                'sisa' => $sisa
            ]);
            $mutasi_stok->load('produk');
            DB::commit();

            return new ApiResource($mutasi_stok, true, 'Mutasi stok berhasil ditambahkan');

        } catch (\Exception $e) {
            DB::rollBack();
            return new ApiResource(null, false, 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $mutasi_stok = Mutasi_Stok::findOrFail($id);
        return new ApiResource($mutasi_stok, true, 'Data mutasi stok berhasil diambil');
    }

}
