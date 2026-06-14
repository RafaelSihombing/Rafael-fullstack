<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TransaksiApiController;

Route::get(
    '/transaksi',
    [TransaksiApiController::class, 'index']
);

Route::post(
    '/transaksi',
    [TransaksiApiController::class, 'store']
);

Route::get(
    '/transaksi/{id}',
    [TransaksiApiController::class, 'show']
);

Route::delete(
    '/transaksi/{id}',
    [TransaksiApiController::class, 'destroy']
);
