<x-layouts.public>
    <!-- 🌟 Quote banner -->
<section class="py-16 px-6 bg-primary text-soft">
    <div class="max-w-4xl mx-auto bg-soft/20 rounded-2xl shadow-soft p-10 text-center">
        <p class="font-heading text-lg italic leading-relaxed text-accent md:text-xl">
            “We believe personal libraries are living spaces — growing, changing, and full of stories worth sharing.
            Domus Libris was built to help you care for them with ease and heart.”
        </p>
    </div>
</section>

    <!-- 📖 About section -->
    <section class="max-w-5xl mx-auto px-6 py-16 grid md:grid-cols-2 gap-10 items-center">
        <img src="{{ asset('images/about-books.png') }}" alt="Stack of books" class="rounded-xl shadow-soft">
        <div>
            <h2 class="font-heading text-3xl text-accent mb-4">Our Story</h2>
            <p class="text-soft leading-relaxed mb-4">
                Domus Libris began as a small project for passionate readers who wanted to keep their personal
                collections alive, organized, and shareable. Whether your library is tucked in a cozy corner or fills an entire room,
                our goal is to make managing it a joy.
            </p>
            <p class="text-soft leading-relaxed">
                Built with simplicity and warmth in mind, Domus Libris blends technology with love for literature —
                bringing beauty and order to your world of books.
            </p>
        </div>
    </section>

    <section class="bg-soft text-primary py-20">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="font-heading text-2xl md:text-3xl text-accent mb-12">What We Value</h2>
            <div class="grid md:grid-cols-3 gap-10">
                <div class="bg-white rounded-xl shadow-soft p-8">
                    <img src="{{ asset('images/icon-community.png') }}" alt="Community icon" class="h-16 mx-auto mb-4">
                    <h3 class="font-heading text-xl text-secondary mb-2">Community</h3>
                    <p class="text-primary leading-relaxed">
                        Books connect people. We believe every library is part of a larger story — one shared between
                        readers, friends, and generations.
                    </p>
                </div>

                <div class="bg-white rounded-xl shadow-soft p-8">
                    <img src="{{ asset('images/icon-organization.png') }}" alt="Organization icon" class="h-16 mx-auto mb-4">
                    <h3 class="font-heading text-xl text-secondary mb-2">Organization</h3>
                    <p class="text-primary leading-relaxed">
                        Keep your shelves in perfect harmony. Easily track where each book is, who borrowed it,
                        and what’s next on your reading list.
                    </p>
                </div>

                <div class="bg-white rounded-xl shadow-soft p-8">
                    <img src="{{ asset('images/icon-creativity.png') }}" alt="Creativity icon" class="h-16 mx-auto mb-4">
                    <h3 class="font-heading text-xl text-secondary mb-2">Creativity</h3>
                    <p class="text-primary leading-relaxed">
                        We celebrate imagination — both in stories and design. Domus Libris aims to make library
                        management as delightful as the books it holds.
                    </p>
                </div>
            </div>
        </div>
    </section>
</x-layouts.public>
