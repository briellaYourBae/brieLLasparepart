<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::orderBy('tanggal_booking', 'desc')->get();
        return view('admin.booking.index', compact('bookings'));
    }

    public function create()
    {
        return view('admin.booking.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'motor' => 'required|string|max:255',
            'jenis_servis' => 'required|string',
            'tanggal_booking' => 'required|date',
            'keluhan' => 'nullable|string',
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
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'motor' => 'required|string|max:255',
            'jenis_servis' => 'required|string',
            'tanggal_booking' => 'required|date',
            'keluhan' => 'nullable|string',
        ]);

        $booking->update($request->all());

        return redirect()->route('admin.booking.index')->with('success', 'Data booking berhasil diperbarui');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('admin.booking.index')->with('success', 'Data booking berhasil dihapus');
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:pending,diproses,selesai,dibatalkan',
        ]);

        $booking->update(['status' => $request->status]);

        return redirect()->route('admin.booking.index')->with('success', 'Status booking berhasil diperbarui');
    }
}
