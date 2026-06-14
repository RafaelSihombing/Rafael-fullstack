<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransaksiController;

Route::get('/', [
    AuthController::class,
    'index'
]);

Route::post('/login', [
    AuthController::class,
    'login'
]);

Route::get('/logout', [
    AuthController::class,
    'logout'
]);

Route::get('/transaksi', [
    TransaksiController::class,
    'index'
]);

Route::post('/transaksi', [
    TransaksiController::class,
    'store'
]);
