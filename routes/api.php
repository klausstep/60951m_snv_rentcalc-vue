<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HouseControllerApi;
use App\Http\Controllers\FlatControllerApi;
use App\Http\Controllers\PaymentControllerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Публичные маршруты
Route::post('/login', [AuthController::class, 'login']);

// Публичные справочники: Дома
Route::get('/houses', [HouseControllerApi::class, 'index']);
Route::get('/houses/{id}', [HouseControllerApi::class, 'show']);

// Защищённые маршруты (по токену)
Route::middleware('auth:sanctum')->group(function () {
    // Квартиры
    Route::get('/flats_total', [FlatControllerApi::class, 'total']);
    Route::get('/flats', [FlatControllerApi::class, 'index']);
    Route::get('/flats/{id}', [FlatControllerApi::class, 'show']);

    // Платежи
    Route::get('/payments_total', [PaymentControllerApi::class, 'total']);
    Route::get('/payments', [PaymentControllerApi::class, 'index']);
    Route::get('/payments/{id}', [PaymentControllerApi::class, 'show']);

    // Аутентификация
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});