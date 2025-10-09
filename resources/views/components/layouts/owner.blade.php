<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Dashboard' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-deepteal text-white dark:bg-gray-900 dark:text-gray-100 min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-deepteal border-r border-teal flex-shrink-0">
        <div class="p-6 font-bold text-sunshine text-xl">📚 Library Admin</div>
        <nav class="px-4 space-y-2">
            <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded hover:bg-teal/20">Dashboard</a>
            <a href="#" class="block px-3 py-2 rounded hover:bg-teal/20">Books</a>
            <a href="#" class="block px-3 py-2 rounded hover:bg-teal/20">Patrons</a>
            <a href="#" class="block px-3 py-2 rounded hover:bg-teal/20">Borrowings</a>
        </nav>
    </aside>

    <!-- Main content -->
    <main class="flex-1 p-8">
        {{ $slot }}
    </main>
</body>
</html>
