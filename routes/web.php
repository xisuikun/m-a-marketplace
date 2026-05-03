<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'app' => 'M&A Marketplace API',
        'version' => '1.2.0',
        'laravel_version' => app()->version(),
    ]);
});
