<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\ServerStatusController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/players', [LeaderboardController::class, 'index']);
Route::get('/online', [ServerStatusController::class, 'index']);

Route::post('/payment/purchase', [CheckoutController::class, 'checkout']);
Route::post('/payment/callback', [CheckoutController::class, 'callback']);

Route::post('/test-payment', [CheckoutController::class, 'test']);
