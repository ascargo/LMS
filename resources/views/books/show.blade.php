<x-layouts.owner>
    <div class="flex flex-col md:flex-row gap-8 bg-white rounded-xl shadow-soft p-6">
        <div class="flex-shrink-0 mx-auto md:mx-0">
            @if ($book->cover)
            <img src="{{ asset('storage/' . $book->cover) }}" alt="Cover of {{ $book->title }}"
                class="w-64 h-auto rounded-xl shadow-md object-contain bg-white">
            @else
            <div class="w-64 h-80 bg-gray-200 rounded-xl flex items-center justify-center text-gray-500 italic">
                No cover available
            </div>
            @endif
        </div>

        <div class="flex flex-col justify-between flex-grow">
            <div>
                <h1 class="text-3xl font-heading text-primary font-bold mb-2">{{ $book->title }}</h1>
                <p class="text-lg text-gray-700 mb-4">by <span class="font-semibold">{{ $book->author }}</span></p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-700">
                    <p><span class="font-semibold">Genre:</span> {{ $book->genre }}</p>
                    <p><span class="font-semibold">Year:</span> {{ $book->year }}</p>
                    <p><span class="font-semibold">Collection:</span> {{ $book->collection }}</p>
                    <p><span class="font-semibold">Location:</span> {{ $book->location }}</p>
                    <p><span class="font-semibold">ISBN:</span> {{ $book->isbn }}</p>
                    <p>
                        <span class="font-semibold">Status:</span>
                        <span class="ml-2 px-2 py-1 rounded-full text-xs font-semibold
                            @switch($book->status->name)
                                @case('Available') bg-green-100 text-green-700 @break
                                @case('Borrowed') bg-yellow-100 text-yellow-700 @break
                                @case('Reserved') bg-orange-100 text-orange-700 @break
                                @case('Lost') bg-red-100 text-red-700 @break
                                @default bg-gray-100 text-gray-700
                            @endswitch">
                            {{ $book->status->name }}
                        </span>
                    </p>
                </div>
            </div>

            <div class="flex flex-wrap gap-3 mt-6">
                <a href="{{ route('books.edit', $book) }}"
                    class="border border-secondary text-secondary px-4 py-2 rounded-lg hover:bg-secondary hover:text-white transition">
                    ✏️ Edit
                </a>

                <form action="{{ route('books.destroy', $book) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this book?')">
                    @csrf @method('DELETE')
                    <button type="submit"
                        class="border border-red-500 text-red-600 px-4 py-2 rounded-lg hover:bg-red-100 transition">
                        🗑️ Delete
                    </button>
                </form>

                <a href="{{ route('borrowings.create', ['book_id' => $book->id]) }}"
                    class="border border-yellow-400 text-yellow-500 px-4 py-2 rounded-lg hover:bg-yellow-100 transition">
                    💛 Borrow
                </a>

                <a href="{{ route('books.index') }}"
                    class="border border-primary text-primary px-4 py-2 rounded-lg hover:bg-primary hover:text-white transition">
                    ↩️ Back to List
                </a>
            </div>
        </div>
    </div>
</x-layouts.owner>