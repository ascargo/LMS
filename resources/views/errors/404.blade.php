<x-layouts.public>
    <section class="flex flex-col items-center justify-center text-center py-24 px-6">
        <img src="{{ asset('images/logo_acc2.png') }}" alt="Domus Libris logo"
            class="h-20 w-auto mb-8 opacity-90">

        <h1 class="text-6xl font-heading font-bold text-accent mb-4">404</h1>
        <h2 class="text-2xl font-semibold text-white mb-4">Page Not Found</h2>
        <p class="text-soft max-w-xl mb-8">
            The page you’re looking for doesn’t exist or may have been moved.
            Try navigating back home or explore the catalogue.
        </p>

        <div class="flex gap-4">
            <a href="{{ route('home') }}"
                class="bg-secondary text-white px-6 py-3 rounded-lg font-heading hover:bg-accent hover:text-primary transition">
                🏠 Go Home
            </a>
            <a href="{{ route('catalogue') }}"
                class="border border-secondary text-secondary px-6 py-3 rounded-lg font-heading hover:bg-secondary hover:text-white transition">
                📚 View Catalogue
            </a>
        </div>
    </section>
</x-layouts.public>