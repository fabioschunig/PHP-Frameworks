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

// Route::get('/series/{series}/seasons', function (\App\Models\Series $series) {
//     return $series->seasons;
// });

Route::get('/series/{series}/seasons', [\App\Http\Controllers\Api\SeriesController::class, 'seasons'])
    ->name('api.series.seasons');

// Route::get('/series/{series}/episodes', function (\App\Models\Series $series) {
//     return $series->episodes;
// });

Route::get('/series/{series}/episodes', [\App\Http\Controllers\Api\SeriesController::class, 'episodes'])
    ->name('api.series.episodes');

// Route::patch('/episodes/{episode}', function (\App\Models\Episode $episode, Request $request) {
//     $episode->watched = $request->watched;
//     $episode->save();

//     return $episode;
// });

Route::patch('/episodes/{episode}', [\App\Http\Controllers\Api\EpisodeController::class, 'watched'])
    ->name('api.episode.watched');

// Route::post('/login', function (Request $request) {
//     $credentials = $request->only(['email', 'password']);
//     dd($credentials);
// });

Route::post('/login', [\App\Http\Controllers\Api\LoginController::class, 'login'])
    ->name('api.login');
