<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-deepteal">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Home Library' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-deepteal text-white dark:bg-gray-900 dark:text-gray-100">

    <!-- Navbar -->
    <nav class="bg-deepteal border-b border-teal px-4 py-3 flex justify-between items-center">
        <a href="{{ url('/') }}" class="text-sunshine font-bold text-lg">
            📚 Home Library
        </a>

        <div class="space-x-4">
            <a href="{{ route('login') }}" class="hover:text-sunshine">Login</a>
            <a href="{{ route('register') }}" class="bg-teal px-3 py-1 rounded hover:bg-sunshine hover:text-deepteal font-medium">
                Request to Join
            </a>
        </div>
    </nav>

    <!-- Main content -->
    <main class="flex-1 container mx-auto p-6">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="text-center py-4 text-sm text-gray-300 dark:text-gray-500">
        © {{ date('Y') }} Home Library. All rights reserved.
    </footer>
</body>
</html>