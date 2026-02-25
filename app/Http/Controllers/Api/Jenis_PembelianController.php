<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ApiResource;
use App\Models\Jenis_Pembelian;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Jenis_PembelianController extends Controller
{
    public function index()
    {
        $jenis_pembelian = Jenis_Pembelian::all();
        return new ApiResource($jenis_pembelian, true, 'Data jenis pembelian berhasil diambil');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_jenis_pembelian' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $jenis_pembelian = Jenis_Pembelian::create($request->all());
        return new ApiResource($jenis_pembelian, true, 'Jenis pembelian berhasil ditambahkan');
     }

     public function show($id)
     {
         $jenis_pembelian = Jenis_Pembelian::findOrFail($id);
         return new ApiResource($jenis_pembelian, true, 'Data jenis pembelian berhasil diambil');
     }
}
