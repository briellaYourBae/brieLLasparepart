<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    protected $table = 'produks';
    
    protected $fillable = [
        'nama_produk',
        'harga',
        'stok',
        'deskripsi',
        'foto_produk',
    ];
}
