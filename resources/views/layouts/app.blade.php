<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'wearV3rse') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-50 flex flex-col">
<!-- Top-Bar -->
<div class="w-full bg-gradient-to-r from-indigo-600 to-violet-600 text-white text-sm">
    <div class="max-w-7xl mx-auto px-4 py-2 flex justify-between items-center">
        <span class="font-medium">{{ config('app.name', 'wearV3rse') }}</span>
        <span class="opacity-90">Dashboard</span>
    </div>
</div>

<!-- Header -->
<header class="w-full bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
        <a href="{{ route('welcome') }}" class="text-xl font-bold tracking-tight text-gray-900">
            {{ config('app.name', 'wearV3rse') }}
        </a>

        <nav class="hidden md:flex items-center gap-6">
            <a href="{{ route('stylebooks.landing') }}" class="text-gray-700 hover:text-gray-900">Stylebooks</a>
            <a href="{{ route('articles.landing') }}" class="text-gray-700 hover:text-gray-900">Articles</a>
            <a href="{{ route('stylebooks.index') }}" class="text-gray-700 hover:text-gray-900">Meine Stylebooks</a>
        </nav>

        <div class="hidden md:flex items-center gap-3">
            <span class="text-sm text-gray-700">Hi, {{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="px-3 py-1.5 rounded border text-sm">Logout</button>
            </form>
        </div>
    </div>
</header>

<!-- Content -->
<main class="flex-1">
    {{ $slot }}
</main>

<!-- Footer -->
<footer class="mt-12 bg-white border-t">
    <div class="max-w-7xl mx-auto px-4 py-6 flex flex-col md:flex-row items-center justify-between gap-3">
        <p class="text-sm text-gray-600">© {{ date('Y') }} {{ config('app.name', 'wearV3rse') }}.</p>
        <div class="flex items-center gap-4 text-sm">
            <a href="{{ route('welcome') }}" class="text-gray-600 hover:text-gray-900">Home</a>
            <a href="{{ route('stylebooks.index') }}" class="text-gray-600 hover:text-gray-900">Meine Stylebooks</a>
        </div>
    </div>
</footer>
</body>
</html>
