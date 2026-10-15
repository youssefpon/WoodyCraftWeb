<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PuzzleController;
use Illuminate\Support\Facades\Route;

// Page d'accueil (visible par tout le monde) - US #13
Route::get('/', [HomeController::class, 'index'])->name('home');

// Page d'une catégorie - US #18
Route::get('/categories/{categorie}', [CategorieController::class, 'show'])->name('categories.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Gestion des puzzles : réservée à l'admin (middleware 'admin' à enregistrer dans Kernel.php)
Route::resource('puzzles', PuzzleController::class)->middleware(['auth', 'admin']);

require __DIR__.'/auth.php';
