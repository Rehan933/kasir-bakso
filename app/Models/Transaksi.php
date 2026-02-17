<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'User_id',
        'total_harga',
        'tanggal',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'User_id');
    }

}
