<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

//public views
Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/catalogue', 'catalogue')->name('catalogue');

//authenticated views
Route::view('/owner-dashboard', 'owner.dashboard')
    ->middleware(['auth'])
    ->name('owner.dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Books CRUD
    Route::resource('books', BookController::class);
});

require __DIR__ . '/auth.php';
