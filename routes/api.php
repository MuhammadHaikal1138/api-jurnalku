<?php

use App\Http\Controllers\Api\AttitudeController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\WitnessController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/student', StudentController::class);
Route::apiResource('/witness', WitnessController::class);
Route::apiResource('/attitude', AttitudeController::class);