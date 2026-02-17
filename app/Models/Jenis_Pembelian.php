<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jenis_Pembelian extends Model
{
    protected $fillable = [
        'User_id',
        'nama_jenis_pembelian',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'User_id');
    }
}
