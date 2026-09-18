<?php

use App\Http\Controllers\HouseControllerApi;
use App\Http\Controllers\FlatControllerApi;
use App\Http\Controllers\PaymentControllerApi;
use Illuminate\Support\Facades\Route;

Route::get('/houses', [HouseControllerApi::class, 'index']);
Route::get('/houses/{id}', [HouseControllerApi::class, 'show']);

Route::get('/flats', [FlatControllerApi::class, 'index']);
Route::get('/flats/{id}', [FlatControllerApi::class, 'show']);

Route::get('/payments', [PaymentControllerApi::class, 'index']);
Route::get('/payments/{id}', [PaymentControllerApi::class, 'show']);