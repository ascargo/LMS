<x-layouts.owner>
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-sunshine">Books</h1>

        <a href="{{ route('books.create') }}"
            class="bg-teal text-white px-4 py-2 rounded hover:opacity-90">
            + Add Book
        </a>
    </div>

    @if (session('success'))
    <div class="mb-4 rounded border border-teal/40 bg-teal/10 px-3 py-2 text-teal">
        {{ session('success') }}
    </div>
    @endif

    <form method="GET" class="mb-4">
        <input type="text" name="q" value="{{ $q }}"
            placeholder="Search by title, author, or ISBN"
            class="w-full sm:w-80 rounded border px-3 py-2 text-black" />
    </form>

    <div class="overflow-x-auto rounded border bg-white dark:bg-gray-800">
        <table class="min-w-full text-left">
            <thead class="bg-deepteal/10 text-deepteal dark:text-white">
                <tr>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Author</th>
                    <th class="px-4 py-2">ISBN</th>
                    <th class="px-4 py-2">Year</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @forelse ($books as $book)
                <tr>
                    <td class="px-4 py-2">{{ $book->title }}</td>
                    <td class="px-4 py-2">{{ $book->author }}</td>
                    <td class="px-4 py-2">{{ $book->isbn }}</td>
                    <td class="px-4 py-2">{{ $book->year }}</td>
                    <td class="px-4 py-2">
                        <span class="inline-block rounded bg-sunshine/30 px-2 py-0.5 text-xs text-deepteal">
                            {{ $book->status->name }}
                        </span>
                    </td>
                    <td class="px-4 py-2 text-right">
                        <a href="{{ route('books.show', $book) }}" class="text-sunshine hover:underline mr-3">View</a>
                        <a href="{{ route('books.edit', $book) }}" class="text-teal hover:underline mr-3">Edit</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline"
                            onsubmit="return confirm('Delete this book?');">
                            @csrf @method('DELETE')
                            <button class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="px-4 py-6 text-gray-500" colspan="6">No books yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $books->links() }}</div>
</x-layouts.owner>