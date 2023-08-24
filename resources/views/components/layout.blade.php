<!DOCTYPE html>
<html class="h-full bg-gray-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="//unpkg.com/alpinejs"></script>
</head>

<body class="h-full font-sans antialiased">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
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
            var options = {
                theme: 'snow'
            };
            var quill = new Quill('#editor', options);

            // Listen for form submission
            document.querySelector('form').addEventListener('submit', function() {
                var content = quill.root.innerHTML;
                document.getElementById('hiddenArea').value = content;
            });
        });
    </script>
</body>

</html>
