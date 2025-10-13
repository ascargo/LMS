<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//public views
Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');

Route::get('/catalogue', function (Request $request) {
    $q = $request->string('q')->toString();

    $books = Book::with('status')
        ->when(
            $q,
            fn ($query) =>
            $query->where(
                fn ($sub) =>
                $sub->where('title', 'like', "%$q%")
                    ->orWhere('author', 'like', "%$q%")
                    ->orWhere('isbn', 'like', "%$q%")
            )
        )
        ->orderBy('title')
        ->paginate(12)
        ->withQueryString();

    return view('catalogue', compact('books', 'q'));
})->name('catalogue');

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

// Public patron request form
Route::view('/patron-request', 'patrons.request')->name('patron.request');
Route::post('/patron-request', [App\Http\Controllers\PatronController::class, 'store'])->name('patron.request.store');
Route::view('/patron-request/thanks', 'patrons.thanks')->name('patron.request.thanks');


// Patron management (owner)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('books', BookController::class);

    Route::get('/patrons', [App\Http\Controllers\PatronController::class, 'index'])->name('patrons.index');
    Route::get('/patrons/{patron}', [App\Http\Controllers\PatronController::class, 'show'])->name('patrons.show');
    Route::delete('/patrons/{patron}', [App\Http\Controllers\PatronController::class, 'destroy'])->name('patrons.destroy');
    Route::patch('/patrons/{patron}/approve', [App\Http\Controllers\PatronController::class, 'approve'])->name('patrons.approve');

    Route::resource('borrowings', App\Http\Controllers\BorrowingController::class);
});
require __DIR__ . '/auth.php';
