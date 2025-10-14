<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PatronController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Book;

// ==============================
// 🏛️ PUBLIC VIEWS
// ==============================
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

// Patron public request form
Route::view('/patron-request', 'patrons.request')->name('patron.request');
Route::post('/patron-request', [PatronController::class, 'store'])->name('patron.request.store');
Route::view('/patron-request/thanks', 'patrons.thanks')->name('patron.request.thanks');

// ==============================
// 🔐 AUTHENTICATED VIEWS
// ==============================
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/owner-dashboard', [DashboardController::class, 'index'])
        ->name('owner.dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Books CRUD
    Route::resource('books', BookController::class);

    // Patrons Management
    Route::get('/patrons', [PatronController::class, 'index'])->name('patrons.index');
    Route::get('/patrons/{patron}', [PatronController::class, 'show'])->name('patrons.show');
    Route::delete('/patrons/{patron}', [PatronController::class, 'destroy'])->name('patrons.destroy');
    Route::patch('/patrons/{patron}/approve', [PatronController::class, 'approve'])->name('patrons.approve');

    // Borrowings CRUD
    Route::resource('borrowings', BorrowingController::class);
});

Route::get('/dashboard', function () {
    return redirect()->route('owner.dashboard');
})->name('dashboard');

require __DIR__ . '/auth.php';
