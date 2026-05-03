<?php

use App\Http\Controllers\Web\DealController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\Web\MarketplaceController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\KycController;
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
    
    // KYC
    Route::get('/kyc', [KycController::class, 'showForm'])->name('kyc.form');
    Route::post('/kyc', [KycController::class, 'submit'])->name('kyc.submit');
    Route::get('/admin/kyc', [KycController::class, 'indexAdmin'])->name('admin.kyc');
    Route::post('/admin/kyc/{kycRequest}/approve', [KycController::class, 'approve'])->name('admin.kyc.approve');
    Route::post('/admin/kyc/{kycRequest}/reject', [KycController::class, 'reject'])->name('admin.kyc.reject');

    Route::post('/deals/{deal}/nda', [DealController::class, 'requestNda'])->name('deals.nda');
    Route::post('/deals/{deal}/bookmark', [DealController::class, 'toggleBookmark'])->name('deals.bookmark');
    
    // Negotiation
    Route::get('/deals/{deal}/messages', [MessageController::class, 'show'])->name('messages.show');
    Route::get('/deals/{deal}/messages/latest', [MessageController::class, 'latest'])->name('messages.latest');
    Route::post('/deals/{deal}/messages', [MessageController::class, 'store'])->name('messages.store');
    // Listings (Sellers)
    Route::get('/listings/create', [ListingController::class, 'create'])->name('listings.create');
    Route::post('/listings', [ListingController::class, 'store'])->name('listings.store');
});
