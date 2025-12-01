<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookStatus;
use App\Enums\BookStatusEnum;
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
            ->search($q)
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

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('covers', 'public');
        }

        if (!isset($data['status_id'])) {
            $data['status_id'] = BookStatus::where('name', BookStatusEnum::Available->value)->value('id');
        }

        Book::create($data);

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        $data = $request->validated();

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('covers', 'public');
        }

        $book->update($data);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
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

    public function destroy(Book $book)
    {
        // ✅ Delete cover file on book deletion
        if ($book->cover && Storage::disk('public')->exists($book->cover)) {
            Storage::disk('public')->delete($book->cover);
        }

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
