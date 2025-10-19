<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Domus Libris' }}</title>

    <!-- 🪶 Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=lato:400,500,700|raleway:400,600,700,800" rel="stylesheet" />

    <!-- ⚡ Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-primary text-soft font-sans antialiased flex flex-col min-h-screen">
    <!-- 🧭 Navbar -->
    <header class="bg-primary text-accent sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <!-- Logo and brand -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <img src="{{ asset('images/logo_acc2.png') }}" alt="Domus Libris logo"
                    class="h-14 w-auto transition-transform group-hover:scale-105">
                <div>
                    <h1 class="font-heading text-xl font-bold leading-none text-accent group-hover:text-secondary transition">
                        Domus Libris
                    </h1>
                    <p class="text-soft text-sm leading-tight">Where books find their place</p>
                </div>
            </a>

            <!-- Navigation -->
            <nav class="flex gap-6 font-heading text-base items-center">
                <a href="{{ route('home') }}" class="hover:text-secondary transition">Home</a>
                <a href="{{ route('catalogue') }}" class="hover:text-secondary transition">Catalogue</a>
                <a href="{{ route('about') }}" class="hover:text-secondary transition">About</a>

                @auth
                <a href="{{ route('owner.dashboard') }}" class="hover:text-secondary transition">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="hover:text-secondary transition">Login</a>
                @endauth
            </nav>
        </div>
    </header>

    <section class="bg-accent text-primary text-center py-3 shadow-inner">
    <p class="font-heading text-base">
        Love books and community?  
        <a href="{{ route('patron.request') }}"
        class="font-semibold text-secondary underline underline-offset-4 hover:text-primary transition">
        Become a Patron
        </a>
        and join the shelves of Domus Libris.
    </p>
</section>

    <!-- 🌿 Main content -->
    <main class="flex-1">
        {{ $slot }}
    </main>

    <!-- 🦶 Footer -->
    <footer class="bg-primary text-soft text-sm py-6 mt-10 border-t border-secondary/20">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center px-6">
            <p>© {{ date('Y') }} Domus Libris. All rights reserved.</p>
            <p class="mt-2 md:mt-0 text-secondary">Built with Laravel & TailwindCSS</p>
        </div>
    </footer>
</body>

</html>