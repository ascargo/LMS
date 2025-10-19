<x-layouts.public>
    <section class="max-w-7xl mx-auto px-6 py-12" x-data="{ view: 'grid' }">
        <!-- 🧭 Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <h1 class="font-heading text-3xl text-accent">Catalogue</h1>

            <!-- Search -->
            <form method="GET" action="{{ route('catalogue') }}" class="flex w-full md:w-auto">
                <input
                    type="text"
                    name="q"
                    placeholder="Search by title, author, or ISBN..."
                    value="{{ request('q') }}"
                    class="flex-1 rounded-l-md border-gray-300 text-primary focus:border-secondary focus:ring-secondary px-3 py-2">
                <button
                    type="submit"
                    class="bg-secondary text-white px-4 rounded-r-md hover:bg-primary transition">
                    Search
                </button>
            </form>

            <!-- Toggle buttons -->
            <div class="flex gap-2 justify-end md:justify-normal">
                <button
                    @click="view = 'grid'"
                    :class="view === 'grid' ? 'bg-secondary text-white' : 'bg-soft text-primary'"
                    class="px-3 py-1 rounded-md font-medium transition">
                    Grid
                </button>
                <button
                    @click="view = 'list'"
                    :class="view === 'list' ? 'bg-secondary text-white' : 'bg-soft text-primary'"
                    class="px-3 py-1 rounded-md font-medium transition">
                    List
                </button>
            </div>
        </div>

        <!-- 📚 Grid view -->
        <div x-show="view === 'grid'" class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($books as $book)
            <div class="bg-white rounded-xl shadow-soft overflow-hidden flex flex-col">
                <div class="mb-4 h-56 rounded-lg overflow-hidden flex items-center justify-center bg-soft/40">
                    @if ($book->cover)
                    <img src="{{ asset('storage/' . $book->cover) }}"
                        alt="Cover of {{ $book->title }}"
                        class="w-full max-w-xs rounded-xl shadow-md object-contain bg-white">
                    @else
                    <div class="w-full max-w-xs h-72 bg-gray-200 rounded-xl flex items-center justify-center text-gray-500 italic">
                        No cover available
                    </div>
                    @endif

                </div>

                <div class="p-4 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="font-heading text-lg text-primary mb-1">{{ $book->title }}</h3>
                        <p class="text-soft text-sm mb-2">{{ $book->author }}</p>
                    </div>
                    @php
                    $statusColors = [
                    'Available' => 'bg-green-100 text-green-800',
                    'Borrowed' => 'bg-yellow-100 text-yellow-800',
                    'Reserved' => 'bg-blue-100 text-blue-800',
                    'Lost' => 'bg-gray-800 text-white',
                    ];
                    @endphp
                    <span class="inline-block self-start text-xs font-medium px-2 py-1 rounded {{ $statusColors[$book->status->name] ?? 'bg-soft text-primary' }}">
                        {{ $book->status->name }}
                    </span>
                </div>
            </div>
            @empty
            <p class="text-accent text-center text-lg font-heading mt-6">No books found.</p>
            @endforelse
        </div>

        <!-- 📋 List view -->
        <div x-show="view === 'list'" class="overflow-x-auto mt-6">
            <table class="min-w-full bg-white rounded-xl shadow-soft">
                <thead class="bg-soft text-primary">
                    <tr>
                        <th class="text-left px-4 py-2">Title</th>
                        <th class="text-left px-4 py-2">Author</th>
                        <th class="text-left px-4 py-2">ISBN</th>
                        <th class="text-left px-4 py-2">Year</th>
                        <th class="text-left px-4 py-2">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($books as $book)
                    <tr>
                        <td class="px-4 py-2">{{ $book->title }}</td>
                        <td class="px-4 py-2">{{ $book->author }}</td>
                        <td class="px-4 py-2">{{ $book->isbn }}</td>
                        <td class="px-4 py-2">{{ $book->year }}</td>
                        <td class="px-4 py-2">
                            @php
                            $statusColors = [
                            'Available' => 'bg-green-100 text-green-800',
                            'Borrowed' => 'bg-yellow-100 text-yellow-800',
                            'Reserved' => 'bg-blue-100 text-blue-800',
                            'Lost' => 'bg-gray-800 text-white',
                            ];
                            @endphp

                            <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold {{ $statusColors[$book->status->name] ?? 'bg-soft text-primary' }}">
                                {{ $book->status->name }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-soft">No books found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-10">
            {{ $books->links() }}
        </div>
    </section>
</x-layouts.public>