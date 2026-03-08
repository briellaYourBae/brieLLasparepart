<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class PublicBookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|numeric|digits_between:10,15',
            'motor' => 'required|string|max:255',
            'jenis_servis' => 'required|string',
            'tanggal_booking' => 'required|date',
            'keluhan' => 'nullable|string',
        ]);

        Booking::create($request->all());

        return redirect()->route('booking')->with('success', 'Booking berhasil dikirim! Mohon tunggu konfirmasi dari admin melalui nomor WhatsApp yang sudah Anda inputkan.');
    }
}
