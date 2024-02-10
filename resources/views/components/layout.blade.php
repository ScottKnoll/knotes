@php
    $notebooks = \App\Models\Notebook::all();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html class="h-full bg-white">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <x-head.tinymce-config />
</head>

<body class="h-full">
    <div x-data="{ sidebarOpen: false }">
        <x-sidebar :notebooks="$notebooks" />
        <x-sidebar-mobile :notebooks="$notebooks" />
        <div class="lg:pl-72">
            <x-search-header />
            <main class="py-10">
                <div class="px-4 sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</body>

</html>
