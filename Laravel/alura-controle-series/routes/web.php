<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('autenticador')->group(function () {

Route::get('/', function () {
    // return view('welcome');
    return redirect('series');
})->middleware(Authenticator::class);

Route::get('/series/{series}/seasons', [SeasonController::class, 'index'])
    ->name('seasons.index')
    ->middleware(Authenticator::class);

Route::get('seasons/{season}/episodes', [EpisodesController::class, 'index'])
    ->name('episodes.index')
    ->middleware(Authenticator::class);

Route::post('seasons/{season}/episodes',  [EpisodesController::class, 'update'])
    ->name('episodes.update')
    ->middleware(Authenticator::class);

//});

Route::get('/login', [LoginController::class, 'index'])
    ->name('login');

Route::post('/login', [LoginController::class, 'store'])
    ->name('signin');

Route::get('/logout', [LoginController::class, 'logout'])
    ->name('logout');

Route::get('/user/create', [UserController::class, 'create'])
    ->name('user.create');

Route::post('/user/create', [UserController::class, 'store'])
    ->name('user.store');
