<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookStatus;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index(Request $request)
    {
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
            ->latest('id')
            ->paginate(12)
            ->withQueryString();

        return view('books.index', compact('books', 'q'));
    }

    public function create()
    {
        $statuses = BookStatus::orderBy('name')->get();
        return view('books.create', compact('statuses'));
    }

    public function store(StoreBookRequest $request)
    {
        $data = $request->validated();

        // ✅ Handle file upload
        if ($request->hasFile('cover')) {
            $data['cover_path'] = $request->file('cover')->store('covers', 'public');
        }

        // Set default status if not provided
        $data['status_id'] ??= BookStatus::where('name', 'Available')->value('id');

        Book::create($data);

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $statuses = BookStatus::orderBy('name')->get();
        return view('books.edit', compact('book', 'statuses'));
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        $data = $request->validated();

        // ✅ Handle cover replacement
        if ($request->hasFile('cover')) {
            // Delete old cover if exists
            if ($book->cover_path && Storage::disk('public')->exists($book->cover_path)) {
                Storage::disk('public')->delete($book->cover_path);
            }

            $data['cover_path'] = $request->file('cover')->store('covers', 'public');
        }

        $book->update($data);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        // ✅ Delete cover file on book deletion
        if ($book->cover_path && Storage::disk('public')->exists($book->cover_path)) {
            Storage::disk('public')->delete($book->cover_path);
        }

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
