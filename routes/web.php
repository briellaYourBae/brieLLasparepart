<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sparepart', [HomeController::class, 'sparepart'])->name('sparepart');
Route::post('/order', [\App\Http\Controllers\PublicOrderController::class, 'store'])->name('order.store');
Route::post('/booking', [\App\Http\Controllers\PublicBookingController::class, 'store'])->name('booking.store');
Route::get('/booking', [HomeController::class, 'booking'])->name('booking');
Route::get('/profil', [HomeController::class, 'profil'])->name('profil');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');
Route::get('/article', [HomeController::class, 'article'])->name('article');
Route::get('/article/{slug}', [HomeController::class, 'articleShow'])->name('article.show');

// Auth Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin Routes
Route::prefix('admin')->middleware(['auth', \App\Http\Middleware\SuperAdminMiddleware::class])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('booking', \App\Http\Controllers\BookingController::class)->names('admin.booking');
    Route::patch('booking/{booking}/status', [\App\Http\Controllers\BookingController::class, 'updateStatus'])->name('admin.booking.updateStatus');
    Route::resource('sparepart', \App\Http\Controllers\SparepartController::class)->names('admin.sparepart');
    Route::resource('order', \App\Http\Controllers\OrderController::class)->only(['index', 'show', 'destroy'])->names('admin.order');
    Route::patch('order/{order}/status', [\App\Http\Controllers\OrderController::class, 'updateStatus'])->name('admin.order.updateStatus');
    Route::resource('article', \App\Http\Controllers\ArticleController::class)->names('admin.article');
    Route::resource('user', \App\Http\Controllers\UserController::class)->names('admin.user');
});
