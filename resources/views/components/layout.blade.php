<!DOCTYPE html>
<html class="h-full bg-gray-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="h-full font-sans antialiased">
    <div class="min-h-full">
        <div class="bg-gradient-to-t from-indigo-800 to-indigo-900 to-80% pb-32">
            @auth
                <x-nav />
            @endauth
            @if (isset($header))
                <header class="py-10">
                    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        {{-- <h1 class="text-3xl font-bold tracking-tight text-white">Dashboard</h1> --}}
                        {{ $header }}
                    </div>
                </header>
            @endif
        </div>
        <main class="-mt-32">
            <div class="px-4 pb-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var quill = new Quill('#editor', {
                theme: 'snow'
            });

            document.querySelector('form').addEventListener('submit', function() {
                var content = quill.root.innerHTML;
                document.querySelector('#hiddenArea').value = content;
            });
        });
    </script>
</body>

</html>
