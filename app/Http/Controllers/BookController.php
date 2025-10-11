<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookStatus;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $q = $request->string('q')->toString();
        $books = Book::with('status')
            ->when(
                $q,
                fn ($query) =>
                $query->where(function ($sub) use ($q) {
                    $sub->where('title', 'like', "%$q%")
                        ->orWhere('author', 'like', "%$q%")
                        ->orWhere('isbn', 'like', "%$q%");
                })
            )
            ->latest('id')
            ->paginate(12)
            ->withQueryString();

        return view('books.index', compact('books', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = BookStatus::orderBy('name')->get();
        return view('books.create', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $data = $request->validated();

        if (!isset($data['status_id'])) {
            $data['status_id'] = BookStatus::where('name', 'Available')->value('id');
        }

        Book::create($data);

        return redirect()->route('books.index')
            ->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $statuses = BookStatus::orderBy('name')->get();
        return view('books.edit', compact('book', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $data = $request->validated();
        $book->update($data);

        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully.');
    }
}
