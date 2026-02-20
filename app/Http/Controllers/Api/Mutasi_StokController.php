<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ApiResource;
use App\Models\Mutasi_Stok;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
            'id_produk' => 'required|exists:produk,id',
            'qty' => 'required|numeric',
            'sisa' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return new ApiResource($validator->errors(), false, 'Validasi gagal');
        }

        $mutasi_stok = Mutasi_Stok::create([$request->all()]);
        return new ApiResource($mutasi_stok, true, 'Mutasi stok berhasil ditambahkan');
    }

    public function show($id)
    {
        $mutasi_stok = Mutasi_Stok::findOrFail($id);
        return new ApiResource($mutasi_stok, true, 'Data mutasi stok berhasil diambil');
    }

}
