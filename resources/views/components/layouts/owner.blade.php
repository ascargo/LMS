<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Domus Libris' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-soft text-primary min-h-screen flex font-sans" x-data="{ open: false }">
    <!-- Mobile header -->
    <header class="md:hidden w-full bg-primary text-accent flex items-center justify-between px-4 py-3 shadow">
        <div class="flex items-center gap-3">
            <button @click="open = !open" class="p-2 rounded bg-accent/20 text-accent hover:bg-accent/30 transition">
                <span x-show="!open">☰</span>
                <span x-show="open">✕</span>
            </button>
            <a href="{{ route('owner.dashboard') }}" class="font-heading font-semibold">Domus Libris</a>
        </div>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); this.closest('form').submit();"
            class="text-sm underline hidden">
            Logout
        </a>
    </header>

    <!-- Sidebar -->
    <aside
        class="w-64 bg-primary text-accent min-h-screen p-6 flex flex-col justify-between shadow-soft transition-transform duration-200
               fixed inset-y-0 left-0 z-40 md:relative md:translate-x-0"
        :class="open ? 'translate-x-0' : '-translate-x-full md:translate-x-0'">

        <!-- TOP: Logo -->
        <div class="text-center mb-10">
            <a href="{{ route('owner.dashboard') }}">
                <img src="{{ asset('images/logo_white.png') }}" alt="Domus Libris logo"
                    class="h-25 w-auto mx-auto hover:opacity-90 transition">
            </a>
        </div>

        <!-- MIDDLE: Navigation -->
        <nav class="flex flex-col gap-3 text-sunshine">
            @php
            $links = [
            ['route' => 'owner.dashboard', 'label' => 'Dashboard'],
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

    <!-- Overlay for mobile -->
    <div class="fixed inset-0 bg-black/40 z-30 md:hidden" x-show="open" @click="open = false"></div>

    <!-- Main content -->
    <main class="flex-1 p-4 md:p-10 overflow-y-auto bg-soft md:ml-0 md:pl-72">
        {{ $slot }}
    </main>

</body>

</html>
