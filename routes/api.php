<?php

use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PackageController;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth:api,cors'])->group(function () {
    /*
    |--------------------------------------------------------------------------
    | Package Routes
    |--------------------------------------------------------------------------
    */
    Route::get('packages', [PackageController::class, 'index']);

    Route::get('packages/{id}', [PackageController::class, 'get']);

    /*
    |--------------------------------------------------------------------------
    | Order Routes
    |--------------------------------------------------------------------------
    */
    Route::get('orders/{id}', [OrderController::class, 'get']);

    Route::post('orders/create', [OrderController::class, 'make']);
});