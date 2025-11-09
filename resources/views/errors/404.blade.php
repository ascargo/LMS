<x-layouts.public>
    <section class="flex flex-col items-center justify-center min-h-[75vh] text-center px-6 relative overflow-hidden">
        {{-- Ambient gradient background --}}
        <div class="absolute inset-0 bg-gradient-to-br from-amber-100/5 via-primary/10 to-transparent -z-10"></div>

        {{-- Floating book emoji animation --}}
        <div class="text-7xl mb-4 animate-bounce-slow select-none">📖</div>

        {{-- Big bold title --}}
        <h1 class="text-6xl sm:text-7xl font-heading font-extrabold text-accent drop-shadow-lg mb-2">
            404
        </h1>

        {{-- Witty subtitle --}}
        <h2 class="text-2xl font-semibold text-primary mb-4">
            This page is overdue 🕰️
        </h2>

        {{-- Playful explanation --}}
        <p class="max-w-md text-soft leading-relaxed mb-8">
            We searched every shelf, checked the archives, and even asked the librarian...  
            but we couldn’t find the page you were looking for.
        </p>

        {{-- Button back home --}}
        <a href="{{ route('home') }}"
        class="inline-flex items-center gap-2 bg-accent text-white px-6 py-3 rounded-full font-heading shadow-md hover:shadow-xl hover:bg-primary transition-all duration-200">
            🏠 Take me home
        </a>

        {{-- Footer note --}}
        <p class="text-xs text-gray-400 italic mt-10">
            (Maybe the page got borrowed and never returned.)
        </p>
    </section>

    {{-- Small animation helper --}}
    <style>
        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-12px); }
        }
        .animate-bounce-slow {
            animation: bounce-slow 3s ease-in-out infinite;
        }
    </style>
</x-layouts.public>
