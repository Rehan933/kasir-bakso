<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
        'User_id',
        'nama_produk',
        'harga',
        'stok',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'User_id');
    }
}
