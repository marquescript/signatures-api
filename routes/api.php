<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::apiResource('/signature', \App\Http\Controllers\SignatureController::class);
Route::apiResource('/plan', \App\Http\Controllers\PlanController::class)->missing(fn() => response()->json(['error' => 'Plan not found'], 404));
Route::apiResource('/client', \App\Http\Controllers\ClientController::class);
