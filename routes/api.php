<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DealController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // Companies
    Route::apiResource('companies', CompanyController::class);

    // Deals
    Route::apiResource('deals', DealController::class);

    // Filtered Deal list for buyers
    Route::get('/marketplace', [DealController::class, 'index']);
});
