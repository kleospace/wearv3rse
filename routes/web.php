<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    WelcomeController,
    ProfileController,
    StylebookController,
    ArticleController
};

/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/stylebooks', [StylebookController::class, 'landing'])->name('stylebooks.landing');

Route::get('/articles', [ArticleController::class, 'landing'])->name('articles.landing');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

/*
|--------------------------------------------------------------------------
| Authenticated
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Stylebooks – voller CRUD + "My"
    Route::get('/my/stylebooks', [StylebookController::class, 'index'])->name('stylebooks.index');
    Route::get('/stylebooks/create', [StylebookController::class, 'create'])->name('stylebooks.create');
    Route::post('/stylebooks', [StylebookController::class, 'store'])->name('stylebooks.store');
    Route::get('/stylebooks/{stylebook}', [StylebookController::class, 'show'])->name('stylebooks.show');
    Route::get('/stylebooks/{stylebook}/edit', [StylebookController::class, 'edit'])->name('stylebooks.edit');
    Route::put('/stylebooks/{stylebook}', [StylebookController::class, 'update'])->name('stylebooks.update');
    Route::delete('/stylebooks/{stylebook}', [StylebookController::class, 'destroy'])->name('stylebooks.destroy');

    // Articles – voller CRUD + "My"
    Route::get('/my/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');

    // Profile (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Breeze auth routes
require __DIR__.'/auth.php';

// Optional dashboard
Route::get('/dashboard', fn () => view('dashboard'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
