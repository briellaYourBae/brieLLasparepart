<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Order;
use App\Models\Sparepart;
use App\Models\Article;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalBookings = Booking::count();
        $totalOrders = Order::count();
        $totalSpareparts = Sparepart::count();
        $totalArticles = Article::count();
        
        $recentBookings = Booking::latest()->take(5)->get();
        $recentOrders = Order::with('sparepart')->latest()->take(5)->get();
        
        return view('admin.dashboard', compact(
            'totalBookings',
            'totalOrders',
            'totalSpareparts',
            'totalArticles',
            'recentBookings',
            'recentOrders'
        ));
    }
}
