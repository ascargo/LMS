<x-layouts.public>
    <section class="min-h-screen flex flex-col items-center justify-center bg-primary text-accent px-6">
        <div class="bg-secondary p-10 rounded-2xl shadow-soft max-w-md text-center">
            <h1 class="font-heading text-3xl mb-4 text-accent">Thank you, friend!</h1>

            <p class="text-primary mb-6 leading-relaxed">
                Your request to join <strong>Domus Libris</strong> has been received.
                Once approved, you’ll be able to explore the collection and ask to borrow books directly.
                <br><br>
                We’ll be in touch soon — until then, may your next story find you.
            </p>

            <a href="{{ route('home') }}"
                class="inline-block bg-primary hover:bg-accent hover:text-primary text-white font-heading font-semibold px-6 py-2 rounded-lg shadow transition">
                Back to Home
            </a>
        </div>
    </section>
</x-layouts.public>