<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mutasi_Stok extends Model
{
    protected $fillable = [
        'User_id',
        'Produk_id',
        'qty',
        'sisa',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'User_id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'Produk_id');
    }
}
