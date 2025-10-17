<x-layouts.owner>
    <section class="max-w-6xl mx-auto px-6 py-10" x-data="{ view: 'list' }">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <h1 class="font-heading text-3xl text-accent">Books</h1>

            <div class="flex gap-2 items-center">
                <!-- Search -->
                <form method="GET" action="{{ route('books.index') }}" class="flex">
                    <input
                        type="text"
                        name="q"
                        placeholder="Search books..."
                        value="{{ request('q') }}"
                        class="rounded-l-md border-gray-300 text-primary focus:border-secondary focus:ring-secondary px-3 py-2">
                    <button
                        type="submit"
                        class="bg-secondary text-white px-4 rounded-r-md hover:bg-primary hover:text-accent transition">
                        Search
                    </button>
                </form>

                <!-- Add Book -->
                <a href="{{ route('books.create') }}"
                    class="bg-accent text-primary font-semibold px-4 py-2 rounded-lg shadow-soft hover:bg-secondary hover:text-white transition">
                    + Add Book
                </a>
            </div>
        </div>

        <!-- 📚 Table view -->
        <div class="bg-white rounded-2xl shadow-soft overflow-hidden">
            <table class="min-w-full text-primary">
                <thead class="bg-accent text-primary uppercase text-sm font-heading tracking-wide border-b border-primary/10">
                    <tr>
                        <th class="text-left px-6 py-3">Title</th>
                        <th class="text-left px-6 py-3">Author</th>
                        <th class="text-left px-6 py-3">Genre</th>
                        <th class="text-left px-6 py-3">Status</th>
                        <th class="text-right px-6 py-3">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @forelse ($books as $book)
                        <tr class="hover:bg-soft/10 transition">
                            <td class="px-6 py-3 font-medium">{{ $book->title }}</td>
                            <td class="px-6 py-3">{{ $book->author }}</td>
                            <td class="px-6 py-3">{{ $book->genre ?? '—' }}</td>
                            <td class="px-6 py-3">
                                <span class="inline-block text-xs font-medium px-2 py-1 rounded
                                    @class([
                                        'bg-green-100 text-green-800' => $book->status->name === 'Available',
                                        'bg-yellow-100 text-yellow-800' => $book->status->name === 'Borrowed',
                                        'bg-blue-100 text-blue-800' => $book->status->name === 'Reserved',
                                        'bg-gray-800 text-white' => $book->status->name === 'Lost',
                                    ])">
                                    {{ $book->status->name }}
                                </span>
                            </td>
                            <td class="px-6 py-3 text-right flex justify-end gap-2">
                                <a href="{{ route('books.show', $book) }}"
                                    class="bg-soft hover:bg-secondary hover:text-white text-primary text-xs font-medium px-3 py-1 rounded-lg shadow transition">
                                    View
                                </a>
                                <a href="{{ route('books.edit', $book) }}"
                                    class="bg-secondary hover:bg-primary hover:text-accent text-white text-xs font-medium px-3 py-1 rounded-lg shadow transition">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('books.destroy', $book) }}"
                                    onsubmit="return confirm('Delete {{ $book->title }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="bg-red-100 hover:bg-red-200 text-red-700 text-xs font-medium px-3 py-1 rounded-lg shadow transition">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-6 text-center text-soft italic">
                                No books found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $books->links() }}
        </div>
    </section>
</x-layouts.owner>
