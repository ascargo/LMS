<x-layouts.owner>
    <section class="max-w-3xl mx-auto px-6 py-10">
        <h1 class="font-heading text-3xl text-accent mb-6">Update Borrowing</h1>

        <div class="bg-accent rounded-2xl shadow-soft p-8 text-primary">
            <form method="POST" 
                action="{{ route('borrowings.update', $borrowing) }}" 
                enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PATCH')

                <!-- Book -->
                <div>
                    <x-input-label for="book_title" value="Book" class="text-primary font-semibold" />
                    <x-text-input id="book_title" type="text"
                        class="mt-1 block w-full bg-white border border-primary/20 text-primary"
                        value="{{ $borrowing->book->title }}" disabled />
                </div>

                <!-- Patron -->
                <div>
                    <x-input-label for="patron_name" value="Patron" class="text-primary font-semibold" />
                    <x-text-input id="patron_name" type="text"
                        class="mt-1 block w-full bg-white border border-primary/20 text-primary"
                        value="{{ $borrowing->patron->name }}" disabled />
                </div>

                <!-- Dates grid -->
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <x-input-label for="borrowed_at" value="Borrowed On" class="text-primary font-semibold" />
                        <x-text-input id="borrowed_at" name="borrowed_at" type="date"
                            class="mt-1 block w-full bg-white border border-primary/20 text-primary focus:border-secondary focus:ring-secondary"
                            value="{{ old('borrowed_at', optional($borrowing->borrowed_at)->format('Y-m-d')) }}" />
                        <x-input-error :messages="$errors->get('borrowed_at')" class="mt-2 text-red-600" />
                    </div>

                    <div>
                        <x-input-label for="returned_at" value="Returned On" class="text-primary font-semibold" />
                        <x-text-input id="returned_at" name="returned_at" type="date"
                            class="mt-1 block w-full bg-white border border-primary/20 text-primary focus:border-secondary focus:ring-secondary"
                            value="{{ old('returned_at', optional($borrowing->returned_at)->format('Y-m-d')) }}" />
                        <x-input-error :messages="$errors->get('returned_at')" class="mt-2 text-red-600" />
                        <p class="text-xs text-primary/70 mt-1">Leave empty if not yet returned.</p>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end gap-3 pt-4">
                    <a href="{{ route('borrowings.index') }}"
                        class="px-4 py-2 rounded-lg border border-primary/30 text-primary hover:bg-primary hover:text-accent transition">
                        Cancel
                    </a>

                    <button type="submit"
                        class="bg-secondary hover:bg-primary hover:text-accent text-white font-heading font-semibold px-6 py-2 rounded-lg shadow transition">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </section>
</x-layouts.owner>
