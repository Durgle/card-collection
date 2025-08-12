<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home/Index');
})->middleware(['guest'])->name('home');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('yugioh')->name('yugioh.')->group(function () {
    Route::get('/', fn() => Inertia::render('Games/Yugioh/Yugioh'))->name('index');
    Route::get('/search', fn() => Inertia::render('Games/Yugioh/Search'))->name('search');
    Route::get('/set', fn() => Inertia::render('Games/Yugioh/Set'))->name('sets');
    Route::get('/deck', fn() => Inertia::render('Games/Yugioh/Deck'))->name('decks');
    Route::get('/banlist', fn() => Inertia::render('Games/Yugioh/Banlist'))->name('banlist');
});

require __DIR__ . '/auth.php';
