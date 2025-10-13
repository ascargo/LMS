<x-layouts.public>
    <section class="min-h-screen bg-primary flex items-center justify-center py-12 px-4">
        <div class="max-w-md w-full bg-accent rounded-2xl shadow-soft p-8 text-primary">
            
            <h1 class="font-heading text-2xl text-center text-primary mb-4">
                Request to Join <span class="text-secondary">Domus Libris</span>
            </h1>

            <p class="text-center text-primary/80 text-sm mb-8">
                We believe libraries are living spaces — growing, changing, and full of stories worth sharing.
                Tell us a little about yourself and why you’d like to become a patron.
            </p>

            <form method="POST" action="{{ route('patron.request.store') }}" class="space-y-5">
                @csrf

                <div>
                    <x-input-label for="name" value="Full Name" class="text-primary font-semibold" />
                    <x-text-input id="name" name="name" type="text"
                        class="mt-1 block w-full bg-white border border-primary/20 text-primary placeholder-gray-500 focus:border-secondary focus:ring-secondary"
                        placeholder="Your full name"
                        value="{{ old('name') }}" required />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
                </div>

                <div>
                    <x-input-label for="email" value="Email Address" class="text-primary font-semibold" />
                    <x-text-input id="email" name="email" type="email"
                        class="mt-1 block w-full bg-white border border-primary/20 text-primary placeholder-gray-500 focus:border-secondary focus:ring-secondary"
                        placeholder="your@email.com"
                        value="{{ old('email') }}" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
                </div>

                <div>
                    <x-input-label for="message" value="Why would you like to join? (optional)" class="text-primary font-semibold" />
                    <textarea id="message" name="message" rows="3"
                        class="mt-1 block w-full rounded-md bg-white border border-primary/20 text-primary placeholder-gray-500 focus:border-secondary focus:ring-secondary"
                        placeholder="Tell us about your love for books...">{{ old('message') }}</textarea>
                </div>

                <div class="flex justify-center pt-2">
                    <button type="submit"
                        class="bg-secondary hover:bg-primary hover:text-accent text-white font-heading font-semibold px-6 py-2 rounded-lg shadow transition">
                        Submit Request
                    </button>
                </div>
            </form>
        </div>
    </section>
</x-layouts.public>
