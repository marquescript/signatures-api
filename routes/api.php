<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/signature', \App\Http\Controllers\SignatureController::class);

Route::apiResource('/plan', \App\Http\Controllers\PlanController::class);
