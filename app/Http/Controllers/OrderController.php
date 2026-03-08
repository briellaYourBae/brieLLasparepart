<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Sparepart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('sparepart')->latest()->get();
        return view('admin.order.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('sparepart');
        return view('admin.order.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,diproses,selesai,dibatalkan',
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->route('admin.order.index')->with('success', 'Status order berhasil diperbarui');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.order.index')->with('success', 'Order berhasil dihapus');
    }
}
