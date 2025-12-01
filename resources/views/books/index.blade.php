<x-layouts.owner>
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-heading text-sunshine font-bold">📚 Books</h1>
        <div class="flex items-center gap-3">
            <a href="{{ route('books.create') }}"
                class="bg-secondary text-white px-4 py-2 rounded-lg shadow hover:bg-primary transition">
                + Add Book
            </a>
        </div>
    </div>

    <div class="overflow-x-auto bg-white rounded-xl shadow-soft">
        <table class="min-w-full border-collapse">
            <thead class="bg-primary text-accent uppercase text-sm font-semibold tracking-wide">
                <tr>
                    <th class="py-3 px-4 text-center">Title</th>
                    <th class="py-3 px-4 text-center">Author</th>
                    <th class="py-3 px-4 text-center">Genre</th>
                    <th class="py-3 px-4 text-center">Status</th>
                    <th class="py-3 px-4 text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($books as $book)
                <tr class="hover:bg-accent/10 transition border-b">
                    <td class="py-3 px-4 align-middle text-center">{{ $book->title }}</td>
                    <td class="py-3 px-4 align-middle text-center">{{ $book->author }}</td>
                    <td class="py-3 px-4 align-middle text-center">{{ $book->genre }}</td>
                    <td class="py-3 px-4 align-middle text-center">
                        @php
                        $colorMap = [
                        'Available' => 'bg-green-100 text-green-700',
                        'Borrowed' => 'bg-yellow-100 text-yellow-700',
                        'Reserved' => 'bg-orange-100 text-orange-700',
                        'Lost' => 'bg-red-100 text-red-700',
                        ];
                        $color = $colorMap[$book->status->name ?? ''] ?? 'bg-gray-100 text-gray-700';
                        @endphp
                        <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $color }}">
                            {{ $book->status->name ?? 'N/A' }}
                        </span>
                    </td>
                    <td class="py-3 px-4 align-middle text-center">
                        <a href="{{ route('books.show', $book) }}"
                            class="bg-secondary text-white px-3 py-1 rounded-lg text-sm hover:bg-primary transition shadow">
                            View
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-6 text-center text-accent/70 italic">
                        No books found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $books->links() }}
    </div>
</x-layouts.owner>
