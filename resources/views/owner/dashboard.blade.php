<x-layouts.owner>
    <section class="max-w-7xl mx-auto px-6 py-10 space-y-8">
        <!-- 🏠 Header -->
        <div>
            <h1 class="font-heading text-3xl text-accent">Dashboard</h1>
            <p class="text-white text-sm mt-1">Welcome back to your library overview.</p>
        </div>

        <!-- 📊 Stats Cards -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-secondary text-white p-6 rounded-2xl shadow-soft">
                <h2 class="text-lg text-white font-semibold">Total Books</h2>
                <p class="text-3xl font-bold mt-2">{{ $totalBooks }}</p>
            </div>
            <div class="bg-accent text-primary p-6 rounded-2xl shadow-soft">
                <h2 class="text-lg text-primary font-semibold">Borrowed Books</h2>
                <p class="text-3xl font-bold mt-2">{{ $borrowedBooks }}</p>
            </div>
            <div class="bg-primary text-accent p-6 rounded-2xl shadow-soft">
                <h2 class="text-lg font-semibold">Patrons</h2>
                <p class="text-3xl font-bold mt-2">{{ $totalPatrons }}</p>
            </div>
            <div class="bg-soft text-accent p-6 rounded-2xl shadow-soft border-2 border-accent">
                <h2 class="text-lg font-semibold">Active Borrowings</h2>
                <p class="text-3xl font-bold mt-2">{{ $activeBorrowings }}</p>
            </div>
        </div>

        <!-- 🗓️ Today's Overview -->
        <div class="grid lg:grid-cols-3 gap-6">
            <!-- 🆕 New Patron Requests -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-soft p-6">
                <h3 class="font-heading text-xl text-primary mb-4">New Patron Requests</h3>
                @forelse ($pendingPatrons as $p)
                    <div class="flex justify-between items-center border-b border-gray-200 py-2">
                        <div>
                            <p class="font-medium">{{ $p->name }}</p>
                            <p class="text-sm text-soft">{{ $p->email }}</p>
                        </div>
                        <a href="{{ route('patrons.show', $p) }}" class="text-secondary hover:text-primary text-sm font-semibold">
                            Review →
                        </a>
                    </div>
                @empty
                    <p class="text-soft text-sm italic">No new requests.</p>
                @endforelse
            </div>

            <!-- 🔄 Recent Borrowings -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-soft p-6">
                <h3 class="font-heading text-xl text-primary mb-4">Recent Borrowings</h3>
                @forelse ($recentBorrowings as $b)
                    <div class="border-b border-gray-200 py-2">
                        <p class="font-medium">{{ $b->book->title ?? '—' }}</p>
                        <p class="text-sm text-soft">
                            {{ $b->patron->name ?? '—' }} • {{ optional($b->borrowed_at)->format('M j, Y') }}
                        </p>
                    </div>
                @empty
                    <p class="text-soft text-sm italic">No borrowings recorded.</p>
                @endforelse
            </div>

            <!-- 🪶 Recently Added Books -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-soft p-6">
                <h3 class="font-heading text-xl text-primary mb-4">Recently Added Books</h3>
                @forelse ($recentBooks as $book)
                    <div class="border-b border-gray-200 py-2">
                        <p class="font-medium">{{ $book->title }}</p>
                        <p class="text-sm text-soft">{{ $book->author }}</p>
                    </div>
                @empty
                    <p class="text-soft text-sm italic">No books added recently.</p>
                @endforelse
            </div>
        </div>
    </section>
</x-layouts.owner>