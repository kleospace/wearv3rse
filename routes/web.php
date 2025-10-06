<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StylebookController;
use App\Http\Controllers\ArticleController;

/**
 * Öffentliche Seiten
 */
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Öffentliche Landing-Pages (Listen)
Route::get('/stylebooks', [StylebookController::class, 'landing'])->name('stylebooks.landing');
Route::get('/articles',   [ArticleController::class, 'landing'])->name('articles.landing');

/**
 * Dashboard (Breeze)
 */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/**
 * Authentifizierte Bereiche
 */
Route::middleware('auth')->group(function () {
    // Meine Stylebooks (Index als eigene Route, damit /stylebooks öffentlich bleiben kann)
    Route::get('/my/stylebooks', [StylebookController::class, 'index'])->name('stylebooks.index');

    // Vollständiges CRUD für Stylebooks, aber ohne index (den haben wir oben als /my/stylebooks)
    Route::resource('stylebooks', StylebookController::class)->except(['index']);

    // Breeze Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/**
 * Breeze Auth-Routen
 */
require __DIR__ . '/auth.php';
