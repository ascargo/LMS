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
        <nav class="flex flex-col gap-3 text-sunshine">
            @php
            $links = [
            ['route' => 'dashboard', 'label' => 'Dashboard'],
            ['route' => 'books.index', 'label' => 'Books'],
            ['route' => 'patrons.index', 'label' => 'Patrons'],
            ['route' => 'borrowings.index', 'label' => 'Borrowings'],
            ];
            @endphp

            @foreach ($links as $link)
            <a href="{{ route($link['route']) }}"
                class="block px-4 py-2 rounded-lg border border-secondary bg-accent text-primary text-center font-medium hover:bg-accent hover:text-primary-dark transition
                {{ request()->routeIs($link['route'] . '*') ? 'bg-accent text-primary font-semibold' : '' }}">
                {{ $link['label'] }}
            </a>
            @endforeach
        </nav>

        <!-- BOTTOM: Logout + Footer -->
        <div class="mt-auto flex flex-col items-center">
            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}" class="mt-auto mb-6 text-center">
                @csrf
                <button type="submit"
                    class="px-4 py-2 w-full max-w-[160px] bg-accent text-primary font-semibold rounded-lg shadow hover:bg-primary hover:text-accent transition">
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