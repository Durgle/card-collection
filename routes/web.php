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
    Route::get('/', fn() => Inertia::render('Games/Yugioh/News'))->name('news.index');
    Route::get('/database', fn() => Inertia::render('Games/Yugioh/Database'))->name('database.index');
    Route::get('/cards', fn() => Inertia::render('Games/Yugioh/CardList'))->name('cards.index');
    Route::get('/cards/{id}', fn() => Inertia::render('Games/Yugioh/Card'))->name('cards.show');
    Route::get('/sets', fn() => Inertia::render('Games/Yugioh/SetList'))->name('sets.index');
    Route::get('/sets/{id}', fn() => Inertia::render('Games/Yugioh/Set'))->name('sets.show');
    Route::get('/decks', fn() => Inertia::render('Games/Yugioh/DeckList'))->name('decks.index');
    Route::get('/decks/{id}', fn() => Inertia::render('Games/Yugioh/Deck'))->name('decks.show');
    Route::get('/banlist', fn() => Inertia::render('Games/Yugioh/Banlist'))->name('banlist.index');
});

require __DIR__ . '/auth.php';
