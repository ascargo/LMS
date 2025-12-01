<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\PatronController;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public views
Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::get('/catalogue', function (Request $request) {
    $q = $request->string('q')->toString();

    $books = Book::with('status')
        ->search($q)
        ->orderBy('title')
        ->paginate(12)
        ->withQueryString();

    return view('catalogue', compact('books', 'q'));
})->name('catalogue');

// Public patron request form
Route::view('/patron-request', 'patrons.request')->name('patron.request');
Route::post('/patron-request', [App\Http\Controllers\PatronController::class, 'store'])
    ->name('patron.request.store');
Route::view('/patron-request/thanks', 'patrons.thanks')->name('patron.request.thanks');

// Authenticated owner/admin area (consolidated to avoid duplicate route definitions)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/owner-dashboard', [DashboardController::class, 'index'])->name('owner.dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Books CRUD
    Route::resource('books', BookController::class);

    // Patrons management
    Route::get('/patrons', [PatronController::class, 'index'])->name('patrons.index');
    Route::get('/patrons/create', [PatronController::class, 'create'])->name('patrons.create');
    Route::get('/patrons/{patron}', [PatronController::class, 'show'])->name('patrons.show');
    Route::post('/patrons', [PatronController::class, 'storeFromOwner'])->name('patrons.store');
    Route::patch('/patrons/{patron}/approve', [PatronController::class, 'approve'])->name('patrons.approve');
    Route::delete('/patrons/{patron}', [PatronController::class, 'destroy'])->name('patrons.destroy');

    // Borrowings management
    Route::resource('borrowings', BorrowingController::class);
});

require __DIR__ . '/auth.php';
