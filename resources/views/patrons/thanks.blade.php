<x-layouts.public>
    <section class="min-h-screen bg-primary flex items-center justify-center py-16 px-4">
        <div class="max-w-md w-full bg-accent rounded-2xl shadow-soft p-10 text-center text-primary">
            
            <!-- Icon or symbol -->
            <div class="mb-6">
                <div class="mx-auto flex items-center justify-center w-20 h-20 rounded-full bg-secondary/20">
                    <span class="text-secondary text-5xl">📚</span>
                </div>
            </div>

            <!-- Heading -->
            <h1 class="font-heading text-3xl text-primary mb-4">
                Thank you for your request!
            </h1>

            <!-- Text -->
            <p class="text-primary/80 text-sm mb-8 leading-relaxed">
                Your request to join <span class="font-semibold text-secondary">Domus Libris</span> has been received.  
                The library owner will review it soon.  
                You’ll receive a confirmation email once your account is approved.
            </p>

            <!-- Button -->
            <div class="flex justify-center">
                <a href="{{ route('home') }}"
                    class="bg-secondary hover:bg-primary hover:text-accent text-white font-heading font-semibold px-6 py-2 rounded-lg shadow transition">
                    Return Home
                </a>
            </div>
        </div>
    </section>
</x-layouts.public>
