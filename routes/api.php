<?php

use App\Http\Controllers\Api\PackageController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    /*
    |--------------------------------------------------------------------------
    | Package Routes
    |--------------------------------------------------------------------------
    */
    Route::get('packages', [PackageController::class, 'index']);
});