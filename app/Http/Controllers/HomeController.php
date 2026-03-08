<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function sparepart()
    {
        $spareparts = \App\Models\Sparepart::latest()->get();
        return view('sparepart', compact('spareparts'));
    }

    public function booking()
    {
        $bookings = \App\Models\Booking::orderBy('tanggal_panen', 'desc')->get();
        return view('booking', compact('bookings'));
    }

    public function profil()
    {
        return view('profil');
    }

    public function kontak()
    {
        return view('kontak');
    }

    public function article()
    {
        $articles = \App\Models\Article::where('status', 'published')->latest()->get();
        return view('article', compact('articles'));
    }

    public function articleShow($slug)
    {
        $article = \App\Models\Article::where('slug', $slug)->where('status', 'published')->firstOrFail();
        return view('article-detail', compact('article'));
    }
}
