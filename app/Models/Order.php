<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'pesanans';
    
    protected $fillable = [
        'nama_pemesan',
        'no_telepon',
        'alamat',
        'produk_id',
        'jumlah',
        'total_harga',
        'metode_pengambilan',
        'metode_pembayaran',
        'dp_dibayar',
        'bukti_pembayaran',
        'tanggal_ambil',
        'status',
    ];

    protected $casts = [
        'total_harga' => 'integer',
        'jumlah' => 'integer',
        'tanggal_ambil' => 'date',
    ];

    public function sparepart()
    {
        return $this->belongsTo(Sparepart::class, 'produk_id');
    }
}
