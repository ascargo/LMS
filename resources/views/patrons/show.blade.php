<x-layouts.owner>
    <section class="max-w-4xl mx-auto px-4 sm:px-6 py-10 space-y-8">

        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="font-heading text-3xl text-accent mb-1">
                    {{ $patron->name }}
                </h1>
                <p class="text-soft">{{ $patron->email }}</p>
            </div>

            <div>
                @if ($patron->approved)
                    <span class="inline-flex items-center gap-1 bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold">
                        ✅ Approved
                    </span>
                @else
                    <span class="inline-flex items-center gap-1 bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-semibold">
                        ⏳ Pending Approval
                    </span>
                @endif
            </div>
        </div>

        <!-- Details Card -->
        <div class="bg-white rounded-2xl shadow-soft p-6 space-y-4">
            <h2 class="font-heading text-lg text-primary mb-2">Patron Details</h2>

            <div class="grid md:grid-cols-2 gap-4 text-sm">
                <div>
                    <p class="font-semibold text-primary/80">Email</p>
                    <p class="text-primary">{{ $patron->email }}</p>
                </div>
                <div>
                    <p class="font-semibold text-primary/80">Joined</p>
                    <p class="text-primary">{{ $patron->created_at->format('F j, Y') }}</p>
                </div>
                <div class="md:col-span-2">
                    <p class="font-semibold text-primary/80">Message</p>
                    <p class="text-primary whitespace-pre-line">{{ $patron->message ?? '—' }}</p>
                </div>
            </div>

            <div class="flex gap-3 pt-4">
                @if (!$patron->approved)
                    <form method="POST" action="{{ route('patrons.approve', $patron) }}">
                        @csrf
                        @method('PATCH')
                        <button
                            class="bg-secondary hover:bg-primary hover:text-accent text-white text-xs font-medium px-4 py-2 rounded-lg shadow transition">
                            Approve Patron
                        </button>
                    </form>
                @endif

                <form method="POST" action="{{ route('patrons.destroy', $patron) }}"
                      onsubmit="return confirm('Remove {{ $patron->name }}?')">
                    @csrf
                    @method('DELETE')
                    <button
                        class="bg-red-100 hover:bg-red-200 text-red-700 text-xs font-medium px-4 py-2 rounded-lg shadow transition">
                        Delete Patron
                    </button>
                </form>
            </div>
        </div>

        <!-- Borrowing History -->
        <div class="bg-white rounded-2xl shadow-soft p-6">
            <h2 class="font-heading text-lg text-primary mb-4">Borrowing History</h2>

            @if ($patron->borrowings && $patron->borrowings->count() > 0)
                <table class="min-w-full text-sm text-primary">
                    <thead class="bg-soft/30">
                        <tr>
                            <th class="text-left px-4 py-2">Book</th>
                            <th class="text-left px-4 py-2">Borrowed On</th>
                            <th class="text-left px-4 py-2">Returned On</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($patron->borrowings as $borrowing)
                            <tr>
                                <td class="px-4 py-2">{{ $borrowing->book->title ?? 'Unknown' }}</td>
                                <td class="px-4 py-2">{{ optional($borrowing->borrowed_at)->format('M j, Y') }}</td>
                                <td class="px-4 py-2">{{ optional($borrowing->returned_at)->format('M j, Y') ?? '—' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-soft italic">No borrowing records found for this patron.</p>
            @endif
        </div>

    </section>
</x-layouts.owner>
