<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    
    protected $fillable = [
        'nama',
        'no_hp',
        'motor',
        'jenis_servis',
        'tanggal_booking',
        'keluhan',
    ];

    protected $casts = [
        'tanggal_booking' => 'date',
    ];
}
