<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail_Transaksi extends Model
{
    protected $fillable = [
        'User_id',
        'Transaksi_id',
        'Produk_id',
        'qty',
        'subtotal',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'User_id');
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'Transaksi_id');

    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'Produk_id');
    }
};
