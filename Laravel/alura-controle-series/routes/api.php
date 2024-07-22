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

Route::get('/series/{series}/seasons', function (\App\Models\Series $series) {
    return $series->seasons;
});

Route::get('/series/{series}/episodes', function (\App\Models\Series $series) {
    return $series->episodes;
});

Route::patch('/episodes/{episode}', function (\App\Models\Episode $episode, Request $request) {
    $episode->watched = $request->watched;
    $episode->save();

    return $episode;
});
