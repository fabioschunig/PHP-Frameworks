<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('/series', function () {
//     return \App\Models\Series::all();
// });

// Route::get('/series', [\App\Http\Controllers\Api\SeriesController::class, 'index'])
//     ->name('api.series.index');

Route::apiResource('/series', \App\Http\Controllers\Api\SeriesController::class);