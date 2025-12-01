<x-layouts.owner>
    <section class="max-w-3xl mx-auto px-4 sm:px-6 py-10">
        <h1 class="font-heading text-3xl text-accent mb-6">Register New Borrowing</h1>

        <div class="bg-accent rounded-2xl shadow-soft p-8 text-primary">
            <form method="POST" action="{{ route('borrowings.store') }}" class="space-y-6">
                @csrf

                <!-- Book -->
                <div>
                    <x-input-label for="book_id" value="Select Book" class="text-primary font-semibold" />
                    <select id="book_id" name="book_id"
                        class="mt-1 block w-full rounded-md border border-primary/20 bg-white text-primary focus:border-secondary focus:ring-secondary">
                        <option value="">-- Choose a Book --</option>
                        @if ($books->count() > 0)
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}" @selected(old('book_id') == $book->id)>
                                    {{ $book->title }} — {{ $book->author }}
                                </option>
                            @endforeach
                        @else   
                            <option value="">No available books right now</option>
                        @endif
                    </select>
                    <x-input-error :messages="$errors->get('book_id')" class="mt-2 text-red-600" />
                </div>

                <!-- Patron -->
                <div>
                    <x-input-label for="patron_id" value="Select Patron" class="text-primary font-semibold" />
                    <select id="patron_id" name="patron_id"
                        class="mt-1 block w-full rounded-md border border-primary/20 bg-white text-primary focus:border-secondary focus:ring-secondary">
                        <option value="">-- Choose a Patron --</option>
                        @foreach ($patrons as $patron)
                            <option value="{{ $patron->id }}" @selected(old('patron_id') == $patron->id)>
                                {{ $patron->name }} — {{ $patron->email }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('patron_id')" class="mt-2 text-red-600" />
                </div>

                <!-- Borrowed date -->
                <div>
                    <x-input-label for="borrowed_at" value="Borrowed At (optional)" class="text-primary font-semibold" />
                    <x-text-input id="borrowed_at" name="borrowed_at" type="date"
                        class="mt-1 block w-full bg-white border border-primary/20 text-primary focus:border-secondary focus:ring-secondary"
                        value="{{ old('borrowed_at') }}" />
                    <x-input-error :messages="$errors->get('borrowed_at')" class="mt-2 text-red-600" />
                </div>

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row sm:justify-end gap-3 pt-4">
                    <a href="{{ route('borrowings.index') }}"
                        class="px-4 py-2 rounded-lg border border-primary/30 text-primary hover:bg-primary hover:text-accent transition">
                        Cancel
                    </a>

                    <button type="submit"
                        class="bg-secondary hover:bg-primary hover:text-accent text-white font-heading font-semibold px-6 py-2 rounded-lg shadow transition">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </section>
</x-layouts.owner>
