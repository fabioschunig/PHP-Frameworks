<?php

use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return "Hello, world!";
});

Route::get('/series', [
    SeriesController::class,
    'listarSeries',
]);
