<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\SeriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return redirect('series');
});

Route::get('/hello', function () {
    return "Hello, world!";
});

// Route::get('/series', [
//     SeriesController::class,
//     'index',
// ]);

// Route::get('/series/create', [
//     SeriesController::class,
//     'create',
// ]);

// Route::post('/series/save', [
//     SeriesController::class,
//     'store',
// ]);

// Route::controller(SeriesController::class)->group(function () {
//     Route::get('/series', 'index');
//     Route::get('/series/create', 'create');
//     Route::post('/series/save', 'store');
// });

Route::resource('/series', SeriesController::class)
    // ->only(['index', 'create', 'store', 'destroy', 'edit', 'update']);
    ->except(['show']);

// Route::post('/series/destroy/{id}', [SeriesController::class, 'destroy'])
//     ->name('series.destroy');

Route::get('/series/{series}/seasons', [SeasonController::class, 'index'])
    ->name('seasons.index');

Route::get('seasons/{season}/episodes', [EpisodesController::class, 'index'])
    ->name('episodes.index');

Route::post('seasons/{season}/episodes', function (Request $request) {
    dd($request->all());
});
