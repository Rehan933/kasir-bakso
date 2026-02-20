<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mutasi_Stok extends Model
{
    protected $fillable = [
        'Produk_id',
        'qty',
        'sisa',
    ];


    public function produk()
    {
        return $this->belongsTo(Produk::class, 'Produk_id');
    }
}
