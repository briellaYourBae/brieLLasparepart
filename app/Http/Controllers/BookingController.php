<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::orderBy('tanggal_panen', 'desc')->get();
        return view('admin.booking.index', compact('bookings'));
    }

    public function create()
    {
        return view('admin.booking.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_panen' => 'required|date',
            'jumlah_panen' => 'required|integer|min:1',
            'kualitas' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        Booking::create($request->all());

        return redirect()->route('admin.booking.index')->with('success', 'Data booking berhasil ditambahkan');
    }

    public function edit(Booking $booking)
    {
        return view('admin.booking.edit', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'tanggal_panen' => 'required|date',
            'jumlah_panen' => 'required|integer|min:1',
            'kualitas' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        $booking->update($request->all());

        return redirect()->route('admin.booking.index')->with('success', 'Data booking berhasil diperbarui');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('admin.booking.index')->with('success', 'Data booking berhasil dihapus');
    }
}
