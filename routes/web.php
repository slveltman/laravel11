<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/overzicht', function () {
    return view('overzicht');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
route::resource('/games', GameController::class);
Route::get('/games/{id}', [GameController::class, 'show'])->name('games.show');
Route::delete('/games/{game}', [GameController::class, 'destroy'])->name('games.destroy');

Route::put('/games/{id}', [GameController::class, 'update'])->name('games.update');
Route::get('/games/{game}/edit', [GameController::class, 'edit'])->name('games.edit');

route::resource('/review', ReviewController::class);
Route::get('/review/{game}', [ReviewController::class, 'show'])->name('review.show');



require __DIR__.'/auth.php';
