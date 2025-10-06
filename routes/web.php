<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{WelcomeController, ProfileController, StylebookController, ArticleController};

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Public landings
Route::get('/stylebooks', [StylebookController::class, 'landing'])->name('stylebooks.landing');
Route::get('/articles',   [ArticleController::class, 'landing'])->name('articles.landing');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

Route::middleware('auth')->group(function () {
    Route::get('/my/stylebooks', [StylebookController::class, 'index'])->name('stylebooks.index');
    Route::resource('stylebooks', StylebookController::class)->except(['index','landing']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/dashboard', fn () => view('dashboard'))
    ->middleware(['auth','verified'])
    ->name('dashboard');
