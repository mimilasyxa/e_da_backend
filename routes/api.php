<?php

use App\Http\Controllers\Order\OrderController;
use Illuminate\Support\Facades\Route;

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

Route::get('/openapi', function () {
    return view('openapi');
});

Route::prefix('order')->group(function () {
    Route::get('/', [OrderController::class, 'get'])
        ->name('api.order.get');
    Route::post('/', [OrderController::class, 'create'])
        ->name('api.order.create');
    Route::post('/join', [OrderController::class, 'join'])
        ->name('api.order.join');
});
