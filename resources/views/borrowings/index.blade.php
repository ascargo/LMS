<x-layouts.owner>
    <section class="max-w-6xl mx-auto px-6 py-10">
        <h1 class="font-heading text-3xl text-accent mb-6">Borrowings</h1>

        @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded-lg shadow-soft mb-6">
            {{ session('success') }}
        </div>
        @endif

        <a href="{{ route('borrowings.create') }}"
            class="bg-secondary text-white font-medium px-4 py-2 rounded-lg shadow hover:bg-primary hover:text-accent transition mb-6 inline-block">
            + Register Borrowing
        </a>

        <div class="bg-white rounded-2xl shadow-soft overflow-hidden">
            <table class="min-w-full text-primary">
                <thead class="bg-accent text-primary uppercase text-sm font-heading tracking-wide border-b border-primary/10">
                    <tr>
                        <th class="text-left px-6 py-3">Book</th>
                        <th class="text-left px-6 py-3">Patron</th>
                        <th class="text-left px-6 py-3">Borrowed At</th>
                        <th class="text-left px-6 py-3">Returned At</th>
                        <th class="text-right px-6 py-3">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @forelse ($borrowings as $b)
                    <tr class="hover:bg-soft/10 transition">
                        <td class="px-6 py-3">{{ $b->book->title ?? '—' }}</td>
                        <td class="px-6 py-3">{{ $b->patron->name ?? '—' }}</td>
                        <td class="px-6 py-3">{{ optional($b->borrowed_at)->format('M j, Y') ?? '—' }}</td>
                        <td class="px-6 py-3">{{ optional($b->returned_at)->format('M j, Y') ?? '—' }}</td>
                        <td class="px-6 py-3 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('borrowings.edit', $b) }}"
                                    class="bg-secondary hover:bg-primary hover:text-accent text-white text-xs font-medium px-3 py-1 rounded-lg shadow transition">
                                    ✏️ Edit
                                </a>

                                <form action="{{ route('borrowings.destroy', $b) }}" method="POST"
                                    onsubmit="return confirm('Delete this borrowing?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-100 hover:bg-red-200 text-red-700 text-xs font-medium px-3 py-1 rounded-lg shadow transition">
                                        🗑️ Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-6 text-center text-soft italic">
                            No borrowings found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-8">
            {{ $borrowings->links() }}
        </div>
    </section>
</x-layouts.owner>