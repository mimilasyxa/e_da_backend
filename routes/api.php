<?php

use App\Http\Controllers\Image\ImageController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Participant\ParticipantController;
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
    Route::post('/', [OrderController::class, 'create'])
        ->name('api.order.create');
});

Route::post('image', [ImageController::class, 'upload'])
    ->name('api.image.upload');
