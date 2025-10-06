<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StylebookController;
use App\Http\Controllers\ArticleController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Öffentliche Landing-Pages
Route::get('/stylebooks', [StylebookController::class, 'landing'])->name('stylebooks.landing');
Route::get('/articles',   [ArticleController::class, 'landing'])->name('articles.landing');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Beispiel: spätere CRUD-Routen
    // Route::resource('stylebooks', StylebookController::class);
    // Route::resource('stylebooks.articles', ArticleController::class)->shallow();

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
