<x-layouts.owner>
    <section class="max-w-3xl mx-auto px-4 sm:px-6 py-10 space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="font-heading text-3xl text-accent">Add Patron</h1>
            <a href="{{ route('patrons.index') }}" class="text-sm text-primary underline underline-offset-4 hover:text-secondary">
                ← Back to patrons
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-soft p-6">
            <form method="POST" action="{{ route('patrons.store') }}" class="space-y-5">
                @csrf

                <div>
                    <x-input-label for="name" value="Name" />
                    <x-text-input id="name" name="name" type="text"
                        class="mt-1 block w-full"
                        value="{{ old('name') }}" required />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="email" value="Email" />
                    <x-text-input id="email" name="email" type="email"
                        class="mt-1 block w-full"
                        value="{{ old('email') }}" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="message" value="Note (optional)" />
                    <textarea id="message" name="message" rows="3"
                        class="mt-1 block w-full rounded-md border-gray-300 focus:border-secondary focus:ring-secondary">{{ old('message') }}</textarea>
                    <x-input-error :messages="$errors->get('message')" class="mt-2" />
                </div>

                <div class="flex items-center gap-2">
                    <input id="approved" name="approved" type="checkbox" value="1"
                        class="rounded border-gray-300 text-secondary focus:ring-secondary"
                        {{ old('approved', true) ? 'checked' : '' }}>
                    <label for="approved" class="text-sm text-primary">Approve immediately</label>
                </div>

                <div class="flex flex-col sm:flex-row sm:justify-end gap-3 pt-4">
                    <a href="{{ route('patrons.index') }}"
                        class="px-4 py-2 rounded-lg border border-primary/30 text-primary hover:bg-primary hover:text-accent transition">
                        Cancel
                    </a>
                    <button type="submit"
                        class="bg-secondary hover:bg-primary hover:text-accent text-white font-heading font-semibold px-6 py-2 rounded-lg shadow transition">
                        Save Patron
                    </button>
                </div>
            </form>
        </div>
    </section>
</x-layouts.owner>
