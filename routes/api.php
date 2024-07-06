<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('/user', \App\Http\Controllers\UserController::class);

Route::apiResource('/client', \App\Http\Controllers\ClientController::class);

Route::apiResource('/signature', \App\Http\Controllers\SignatureController::class);

Route::apiResource('/plan', \App\Http\Controllers\PlanController::class)
    ->parameters(['plan' => 'plan:cod'])
    ->missing(fn() => response()->json(['error' => 'Plan not found'], 404));

Route::apiResource('/client', \App\Http\Controllers\ClientController::class);
