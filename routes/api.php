<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ShipController;


Route::get('/test', function () {
    return response()->json(['message' => 'API Working perfect !!!']);
});


Route::post('/login', [AuthController::class, 'login']);

Route::middleware('api.token')->group(function () {
    Route::apiResource('ships', ShipController::class);
});
