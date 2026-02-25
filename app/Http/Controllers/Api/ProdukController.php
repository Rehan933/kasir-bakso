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
        'nama_produk' => 'required|string|max:255',
        'harga' => 'required|numeric|min:0',
        'stok' => 'required|integer|min:0',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $produk = Produk::create([
        'nama_produk' => $request->nama_produk,
        'harga' => $request->harga,
        'stok' => $request->stok,
    ]);

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

        if (is_null($produk)) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
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
