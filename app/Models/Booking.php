<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'panens';
    
    protected $fillable = [
        'tanggal_panen',
        'jumlah_panen',
        'kualitas',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_panen' => 'date',
    ];
}
