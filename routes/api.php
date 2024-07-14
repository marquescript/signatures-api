<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::post('/register',[ \App\Http\Controllers\AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);

    Route::apiResource('/user', \App\Http\Controllers\UserController::class)->except(['index']);

    Route::apiResource('/client', \App\Http\Controllers\ClientController::class);

    Route::apiResource('/signature', \App\Http\Controllers\SignatureController::class);

    Route::apiResource('/plan', \App\Http\Controllers\PlanController::class);

});





