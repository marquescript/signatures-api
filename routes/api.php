<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);

    Route::apiResource('/user', \App\Http\Controllers\UserController::class);

    Route::apiResource('/client', \App\Http\Controllers\ClientController::class)
        ->missing(fn() => response()->json(['error' => 'Client not found'], 404));
});


Route::apiResource('/signature', \App\Http\Controllers\SignatureController::class);

Route::apiResource('/plan', \App\Http\Controllers\PlanController::class)
    ->parameters(['plan' => 'plan:cod'])
    ->missing(fn() => response()->json(['error' => 'Plan not found'], 404));

