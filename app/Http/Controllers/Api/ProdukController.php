<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ApiResource;
use App\Models\Produk;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return new ApiResource($produk, true, 'Data produk berhasil diambil');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return new ApiResource($validator->errors(), false, 'Validasi gagal');
        }

        $produk = Produk::create($request->all());

        return new ApiResource($produk, true, 'Produk berhasil ditambahkan');
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return new ApiResource($produk, true, 'Data produk berhasil diambil');
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return new ApiResource($validator->errors(), false, 'Validasi gagal');
        }

        $produk->update($request->all());

        return new ApiResource($produk, true, 'Produk berhasil diperbarui');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return new ApiResource($produk, true, 'Produk berhasil dihapus');
    }
}
