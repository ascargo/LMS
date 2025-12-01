<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Book;
use App\Models\Patron;
use App\Enums\BookStatusEnum;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with(['book', 'patron'])
            ->orderByDesc('borrowed_at')
            ->paginate(10);

        return view('borrowings.index', compact('borrowings'));
    }

    public function create()
    {
        $books = Book::statusNotIn([
            BookStatusEnum::Borrowed->value,
            BookStatusEnum::Reserved->value,
            BookStatusEnum::Lost->value,
        ])
            ->orderBy('title')
            ->get();

        $patrons = Patron::where('approved', true)->orderBy('name')->get();

        return view('borrowings.create', compact('books', 'patrons'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
        'book_id'      => ['required', 'exists:books,id'],
        'patron_id'    => ['required', 'exists:patrons,id'],
        'borrowed_at'  => ['nullable', 'date'],
        'returned_at'  => ['nullable', 'date'],
    ]);

        $borrowing = Borrowing::create($data);

        $borrowing->book->update([
            'status_id' => \App\Models\BookStatus::where('name', BookStatusEnum::Borrowed->value)->value('id')
        ]);

        return redirect()->route('borrowings.index')->with('success', 'Borrowing created successfully.');
    }

    public function edit(Borrowing $borrowing)
    {
        $books = Book::orderBy('title')->get();
        $patrons = Patron::where('approved', true)->orderBy('name')->get();

        return view('borrowings.edit', compact('borrowing', 'books', 'patrons'));
    }

    public function update(Request $request, Borrowing $borrowing)
    {
        $data = $request->validate([
        'borrowed_at'  => ['nullable', 'date'],
        'returned_at'  => ['nullable', 'date'],
    ]);

        $borrowing->update($data);

        if ($borrowing->returned_at) {
            $borrowing->book->update([
                'status_id' => \App\Models\BookStatus::where('name', BookStatusEnum::Available->value)->value('id')
            ]);
        }

        return redirect()->route('borrowings.index')->with('success', 'Borrowing updated.');
    }

    public function destroy(Borrowing $borrowing)
    {
        $borrowing->delete();
        return redirect()->route('borrowings.index')
            ->with('success', 'Borrowing record deleted.');
    }
}
