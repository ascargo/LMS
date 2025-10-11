<x-layouts.public>
    <!-- Hero section -->
    <section class="relative">
        <img src="{{ asset('images/bookshelf-hero.png') }}" alt="Bookshelf" class="w-full h-72 object-cover">
        <div class="absolute inset-0 bg-primary/70 flex flex-col justify-center items-center text-center px-6">
            <h2 class="font-heading text-accent text-4xl md:text-5xl font-bold mb-2">Domus Libris</h2>
            <p class="text-soft text-lg">Where books find their place</p>
        </div>
    </section>

    <!-- Introduction -->
    <section class="max-w-5xl mx-auto px-6 py-12 grid md:grid-cols-2 gap-8 items-center">
        <img src="{{ asset('images/reading.png') }}" alt="Reading" class="rounded-lg shadow-soft">
        <div>
            <h3 class="font-heading text-2xl text-accent mb-4">A Home for Every Book</h3>
            <p class="text-soft leading-relaxed">
                Domus Libris is a project for book lovers, by book lovers. Born from the desire to cherish our personal
                libraries, it offers a simple and elegant way to keep track of your precious books — where they are,
                who’s reading them, and what memories they hold.
            </p>
        </div>
    </section>
</x-layouts.public>