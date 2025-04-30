<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Portfolio') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 h-full flex flex-col min-h-screen">

    <nav class="bg-white shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div>
                    <a href="/" class="text-xl font-bold text-gray-800">Portfolio</a>
                </div>
                <div class="flex space-x-4">
                    <a href="/" class="text-gray-600 hover:text-gray-800">Home</a>
                    <a href="/about" class="text-gray-600 hover:text-gray-800">About</a>
                    <a href="/projects" class="text-gray-600 hover:text-gray-800">Projects</a>
                    <a href="/contact" class="text-gray-600 hover:text-gray-800">Contact</a>
                </div>
            </div>
        </div>
    </nav>

    {{-- Main content should grow to fill the space --}}
    <main class="flex-grow py-8">
        @yield('content')
    </main>

    <footer class="bg-white shadow-lg">
        <div class="max-w-6xl mx-auto px-4 py-6">
            <p class="text-center text-gray-600">&copy; {{ date('Y') }}</p>
        </div>
    </footer>

</body>
</html>
