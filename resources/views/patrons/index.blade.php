<x-layouts.owner>
    <section class="max-w-6xl mx-auto px-4 sm:px-6 py-10">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <h1 class="font-heading text-3xl text-accent">Patrons</h1>

            @if (session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded-lg shadow-soft">
                {{ session('success') }}
            </div>
            @endif

            <a href="{{ route('patrons.create') }}"
                class="bg-secondary text-white font-medium px-4 py-2 rounded-lg shadow hover:bg-primary hover:text-accent transition w-full md:w-auto text-center">
                + Add Patron
            </a>
        </div>

        <!-- Card container -->
        <div class="bg-white rounded-2xl shadow-soft overflow-hidden">
            <table class="min-w-full text-primary">
                <thead class="bg-primary text-accent uppercase text-sm font-heading tracking-wide border-b border-primary/10">
                    <tr>
                        <th class="text-center px-6 py-3">Name</th>
                        <th class="text-center px-6 py-3">Email</th>
                        <th class="text-center px-6 py-3">Status</th>
                        <th class="text-center px-6 py-3">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @forelse ($patrons as $patron)
                    <tr class="hover:bg-soft/10 transition">
                        <td class="px-6 py-3 font-medium">{{ $patron->name }}</td>
                        <td class="px-6 py-3">{{ $patron->email }}</td>

                        <!-- Status -->
                        <td class="px-6 py-3 text-center">
                            @if ($patron->approved)
                            <span class="inline-flex items-center gap-1 bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold">
                                ✅ Approved
                            </span>
                            @else
                            <span class="inline-flex items-center gap-1 bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-semibold">
                                ⏳ Pending
                            </span>
                            @endif
                        </td>

                        <!-- Actions -->
                        <td class="px-6 py-3 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('patrons.show', $patron) }}"
                                    class="bg-accent hover:bg-secondary hover:text-white text-primary text-xs font-medium px-3 py-1 rounded-lg shadow transition">
                                    View
                                </a>

                                @if (!$patron->approved)
                                <form method="POST" action="{{ route('patrons.approve', $patron) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button
                                        class="bg-secondary hover:bg-primary hover:text-accent text-white text-xs font-medium px-3 py-1 rounded-lg shadow transition">
                                        Approve
                                    </button>
                                </form>
                                @endif

                                <form method="POST" action="{{ route('patrons.destroy', $patron) }}"
                                    onsubmit="return confirm('Remove {{ $patron->name }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="bg-red-100 hover:bg-red-200 text-red-700 text-xs font-medium px-3 py-1 rounded-lg shadow transition">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-6 text-center text-soft italic">
                            No patrons found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $patrons->links() }}
        </div>
    </section>
</x-layouts.owner>
