<?php

use App\Http\Controllers\DealController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\Web\MarketplaceController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\MessageController;
use Illuminate\Support\Facades\Route;

// Marketplace
Route::get('/', [MarketplaceController::class, 'index'])->name('marketplace');
Route::get('/deals/{deal}', [DealController::class, 'show'])->name('deals.show');

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard (Yêu cầu đăng nhập)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/deals/{deal}/nda', [DealController::class, 'requestNda'])->name('deals.nda');
    
    // Negotiation
    Route::get('/deals/{deal}/messages', [MessageController::class, 'show'])->name('messages.show');
    Route::post('/deals/{deal}/messages', [MessageController::class, 'store'])->name('messages.store');
    // Listings (Sellers)
    Route::get('/listings/create', [ListingController::class, 'create'])->name('listings.create');
    Route::post('/listings', [ListingController::class, 'store'])->name('listings.store');
});
