<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\FrameworkController;
use App\Http\Controllers\Backend\LanguageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// category
Route::resource('categories', CategoryController::class);
Route::resource('languages', LanguageController::class);
Route::resource('frameworks', FrameworkController::class);


require __DIR__.'/auth.php';
