<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StylebookController;
use App\Http\Controllers\ArticleController;

/**
 * Öffentlich
 */
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

/**
 * Geschützte Bereiche (Login erforderlich)
 * - Wer als Gast /stylebooks oder /articles aufruft, landet automatisch auf /login
 *   und wird nach erfolgreichem Login zur ursprünglich gewünschten Seite zurückgeleitet.
 */
Route::middleware('auth')->group(function () {
    // Geschützte Landing-Seiten
    Route::get('/stylebooks', [StylebookController::class, 'landing'])->name('stylebooks.landing');
    Route::get('/articles',   [ArticleController::class, 'landing'])->name('articles.landing');

    // Vollständiges CRUD für Stylebooks, aber ohne index (um /stylebooks nicht zu überschreiben)
    Route::resource('stylebooks', StylebookController::class)->except(['index']);

    // Optional: eigene Übersicht deiner Stylebooks
    Route::get('/my/stylebooks', [StylebookController::class, 'index'])->name('stylebooks.index');

    // Breeze Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/**
 * Breeze Auth-Routen (Login/Logout/Register)
 */
require __DIR__ . '/auth.php';

// Optional (wie von Breeze): Dashboard für verifizierte Nutzer
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
