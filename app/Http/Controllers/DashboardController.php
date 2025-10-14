<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Patron;
use App\Models\Borrowing;

class DashboardController extends Controller
{
    public function index()
    {
        // 📚 Summary stats
        $totalBooks = Book::count();
        $borrowedBooks = Book::whereHas('status', fn ($q) => $q->where('name', 'Borrowed'))->count();
        $totalPatrons = Patron::count();
        $activeBorrowings = Borrowing::whereNull('returned_at')->count();

        // 🆕 New Patron Requests
        $pendingPatrons = Patron::where('approved', false)->latest()->take(5)->get();

        // 🔄 Recent Borrowings
        $recentBorrowings = Borrowing::with(['book', 'patron'])
            ->orderByDesc('borrowed_at')
            ->take(5)
            ->get();

        // 🪶 Recently Added Books
        $recentBooks = Book::latest()->take(5)->get();

        return view('owner.dashboard', compact(
            'totalBooks',
            'borrowedBooks',
            'totalPatrons',
            'activeBorrowings',
            'pendingPatrons',
            'recentBorrowings',
            'recentBooks'
        ));
    }
}
