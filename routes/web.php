<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
    Route::post('/games', [GameController::class, 'store'])->name('games.store');


});

Route::middleware(['auth'])->group(function () {
    Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
    Route::post('/games', [GameController::class, 'store'])->name('games.store');

});

// game routes
route::resource('/games', GameController::class);
Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/{id}', [GameController::class, 'show'])->name('games.show');
Route::delete('/games/{game}', [GameController::class, 'destroy'])->middleware(['auth', 'verified'])->name('games.destroy');
Route::put('/games/{id}', [GameController::class, 'update'])->middleware(['auth', 'verified'])->name('games.update');
Route::get('/games/{game}/edit', [GameController::class, 'edit'])->middleware(['auth', 'verified'])->name('games.edit');
Route::get('/games/create', [GameController::class, 'create'])->middleware(['auth', 'verified'])->name('games.create');
Route::post('/games', [GameController::class, 'store'])->middleware(['auth', 'verified'])->name('games.store');

//review routes
route::resource('/review', ReviewController::class);
Route::get('/review/{game}', [ReviewController::class, 'show'])->middleware(['auth', 'verified'])->name('review.show');
Route::get('/reviews/create/{game}', [ReviewController::class, 'create'])->middleware(['auth', 'verified'])->name('review.create');




require __DIR__.'/auth.php';
