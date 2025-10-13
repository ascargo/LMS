<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Domus Libris' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-soft text-primary min-h-screen flex font-sans">

    <!-- Sidebar -->
    <aside class="w-64 bg-primary text-accent min-h-screen p-6 flex flex-col justify-between shadow-soft">

        <!-- TOP: Logo -->
        <div class="text-center mb-10">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('images/logo_white.png') }}" alt="Domus Libris logo"
                    class="h-25 w-auto mx-auto hover:opacity-90 transition">
            </a>
        </div>

        <!-- MIDDLE: Navigation -->
        <nav class="flex-1 flex flex-col items-center gap-4 text-primary">
            @php
            $links = [
            ['name' => 'Dashboard', 'route' => 'dashboard'],
            ['name' => 'Books', 'route' => 'books.index'],
            ['name' => 'Patrons', 'route' => 'patrons.index'],
            ['name' => 'Borrowings', 'route' => 'borrowings.index'],
            ];
            @endphp

            @foreach ($links as $link)
            <a href="{{ route($link['route']) }}"
                class="w-40 text-center px-4 py-2 rounded-lg border-2 border-accent text-accent font-medium 
                 hover:bg-accent hover:text-primary transition
                {{ request()->routeIs(Str::before($link['route'], '.') . '*') ? 'bg-accent text-primary font-semibold' : '' }}">
                {{ $link['name'] }}
            </a>
            @endforeach
        </nav>

        <!-- BOTTOM: Logout + Footer -->
        <div class="mt-auto flex flex-col items-center">
            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}" class="mb-4">
                @csrf
                <button
                    type="submit"
                    class="px-6 py-2 rounded-lg bg-secondary text-white hover:bg-primary hover:text-accent 
                    font-heading font-semibold shadow transition">
                    Logout
                </button>
            </form>

            <!-- Footer -->
            <div class="text-xs text-sunshine/70 text-center">
                © {{ date('Y') }} Domus Libris
            </div>
        </div>
    </aside>


    <!-- Main content -->
    <main class="flex-1 p-10 overflow-y-auto bg-soft">
        {{ $slot }}
    </main>

</body>

</html>