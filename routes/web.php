<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;




Route::get('/', [HomeController::class, 'index'])->name('welcome');

//Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('welcome');
Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource("articles", \App\Http\Controllers\ArticleController::class)->middleware("auth");

require __DIR__.'/auth.php';
