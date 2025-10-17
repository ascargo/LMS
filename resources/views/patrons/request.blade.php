<x-layouts.public>
    <section class="min-h-screen bg-primary flex items-center justify-center py-16 px-6">
        <div class="max-w-md w-full bg-soft rounded-2xl shadow-soft p-10 text-primary">

            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="font-heading text-3xl text-accent">Become a Patron</h1>
            </div>

            <!-- Intro text -->
            <p class="text-center text-white text-sm mb-10 leading-relaxed">
                <strong>Domus Libris</strong> is a living, growing personal library —
                a home for stories worth sharing among friends.
                <br><br>
                If you’ve been invited or are part of this circle, you can request to become a <strong>Patron</strong>.
                This allows you to browse the full collection, see what’s available, and ask to borrow books directly.
            </p>

            <!-- Success message -->
            @if (session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded-lg shadow-soft mb-4 text-center">
                {{ session('success') }}
            </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('patron.request.store') }}" class="space-y-5">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" value="Your Full Name" class="text-primary font-semibold" />
                    <x-text-input id="name" name="name" type="text"
                        class="mt-1 block w-full bg-white border border-primary/20 text-primary placeholder-gray-500 focus:border-secondary focus:ring-secondary"
                        placeholder="Jane Doe"
                        value="{{ old('name') }}" required />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
                </div>

                <!-- Email -->
                <div>
                    <x-input-label for="email" value="Email Address" class="text-primary font-semibold" />
                    <x-text-input id="email" name="email" type="email"
                        class="mt-1 block w-full bg-white border border-primary/20 text-primary placeholder-gray-500 focus:border-secondary focus:ring-secondary"
                        placeholder="jane@example.com"
                        value="{{ old('email') }}" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
                </div>

                <!-- Message -->
                <div>
                    <x-input-label for="message" value="Say hello (optional)" class="text-primary font-semibold" />
                    <textarea id="message" name="message" rows="3"
                        class="mt-1 block w-full rounded-md bg-white border border-primary/20 text-primary placeholder-gray-500 focus:border-secondary focus:ring-secondary"
                        placeholder="Tell me what draws you to books, or how we know each other...">{{ old('message') }}</textarea>
                </div>

                <!-- Submit -->
                <div class="flex justify-center pt-4">
                    <button type="submit"
                        class="bg-secondary hover:bg-primary hover:text-accent text-white font-heading font-semibold px-6 py-2 rounded-lg shadow transition">
                        Send Request
                    </button>
                </div>
            </form>

            <!-- ✨ Footer snippet -->
            <div class="mt-12 text-center text-sm text-white border-t border-primary/20 pt-6">
                <img src="{{ asset('images/reading_cup.png') }}" alt="Person reading with a cup of a hot drink"
                    class="h-24 mx-auto mb-4 opacity-80">
                <p class="italic leading-relaxed">
                    “Libraries are not just where books live — they are where friendships quietly grow
                    between pages, tea cups, and shared silences.”
                </p>
                <p class="mt-4 text-white/80">
                    <strong>Domus Libris</strong> — a personal project of Asier, built for the joy of sharing books.
                </p>
            </div>

        </div>
    </section>
</x-layouts.public>