<?php

use App\Http\Controllers\SeriesController;
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
    ->only(['index', 'create', 'store']);
