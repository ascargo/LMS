<x-layouts.owner>
    <h1 class="text-3xl font-bold text-sunshine mb-4">{{ $book->title }}</h1>

    <ul class="space-y-2 text-white">
        <li><strong>Author:</strong> {{ $book->author }}</li>
        <li><strong>ISBN:</strong> {{ $book->isbn }}</li>
        <li><strong>Year:</strong> {{ $book->year }}</li>
        <li><strong>Genre:</strong> {{ $book->genre }}</li>
        <li><strong>Collection:</strong> {{ $book->collection }}</li>
        <li><strong>Location:</strong> {{ $book->location }}</li>
        <li><strong>Status:</strong> {{ $book->status->name }}</li>
    </ul>

    <div class="mt-6">
        <a href="{{ route('books.edit', $book) }}" class="text-teal hover:underline mr-4">Edit</a>
        <a href="{{ route('books.index') }}" class="text-sunshine hover:underline">Back to list</a>
    </div>
</x-layouts.owner>
