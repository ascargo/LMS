<x-layouts.owner>
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-heading text-sunshine font-bold">📖 Borrowings</h1>
        <div class="flex items-center gap-3">
            <form action="{{ route('borrowings.index') }}" method="GET" class="flex items-center gap-2">
                <input type="text" name="q" placeholder="Search..."
                    class="px-3 py-2 border rounded-lg text-sm focus:ring-secondary focus:border-secondary">
            </form>
            <a href="{{ route('borrowings.create') }}"
                class="bg-secondary text-white px-4 py-2 rounded-lg shadow hover:bg-primary transition">
                + Register Borrowing
            </a>
        </div>
    </div>

    <div class="overflow-x-auto bg-white rounded-xl shadow-soft">
        <table class="min-w-full border-collapse">
            <thead class="bg-primary text-accent uppercase text-sm font-semibold tracking-wide">
                <tr>
                    <th class="py-3 px-4 text-center">Patron</th>
                    <th class="py-3 px-4 text-center">Book</th>
                    <th class="py-3 px-4 text-center">Borrowed</th>
                    <th class="py-3 px-4 text-center">Returned</th>
                    <th class="py-3 px-4 text-center">Status</th>
                    <th class="py-3 px-4 text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($borrowings as $borrowing)
                <tr class="hover:bg-accent/10 transition border-b">
                    <td class="py-3 px-4 align-middle text-center">{{ $borrowing->patron->name }}</td>
                    <td class="py-3 px-4 align-middle text-center">{{ $borrowing->book->title }}</td>
                    <td class="py-3 px-4 align-middle text-center">{{ $borrowing->borrowed_at ? $borrowing->borrowed_at->format('Y-m-d') : '-' }}</td>
                    <td class="py-3 px-4 align-middle text-center">{{ $borrowing->returned_at ? $borrowing->returned_at->format('Y-m-d') : '-' }}</td>
                    <td class="py-3 px-4 align-middle text-center">
                        @php
                        $status = $borrowing->returned_at ? 'Returned' : 'Borrowed';
                        $color = $borrowing->returned_at
                        ? 'bg-green-100 text-green-700'
                        : 'bg-yellow-100 text-yellow-700';
                        @endphp
                        <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $color }}">
                            {{ $status }}
                        </span>
                    </td>
                    <td class="py-3 px-4 align-middle text-center">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('borrowings.show', $borrowing) }}"
                                class="bg-secondary text-white px-3 py-1 rounded-lg text-sm hover:bg-primary transition shadow">
                                View
                            </a>
                            @if(!$borrowing->returned_at)
                            <form action="{{ route('borrowings.update', $borrowing) }}" method="POST" onsubmit="return confirm('Mark as returned?')">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="returned_at" value="{{ now() }}">
                                <button type="submit"
                                    class="border border-yellow-500 text-yellow-600 px-3 py-1 rounded-lg text-sm hover:bg-yellow-100 transition">
                                    Return
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-6 text-center text-accent/70 italic">
                        No borrowings found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $borrowings->links() }}
    </div>
</x-layouts.owner>