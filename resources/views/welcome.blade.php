<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>wearV3rse – Willkommen</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="antialiased">
<main class="container mx-auto p-8">
    <h1 class="text-3xl font-bold mb-4">Willkommen bei WearV3rse</h1>
    <p class="mb-6">Das ist deine Startseite. Für die Abgabe zeigen wir hier gleich die neuesten Stylebooks.</p>

    @auth
        <p class="mb-4">Angemeldet als: {{ auth()->user()->name }}</p>
        <a class="px-3 py-2 bg-blue-600 text-white rounded" href="{{ route('stylebooks.index') }}">Meine Stylebooks</a>
    @else
        <div class="flex gap-4">
            <a class="underline" href="{{ route('login') }}">Login</a>
            <a class="underline" href="{{ route('register') }}">Registrieren</a>
        </div>
    @endauth

    {{-- Wenn wir später Daten übergeben (z. B. $latest), zeigen wir sie hier: --}}
    @isset($latest)
        <h2 class="text-xl font-semibold mt-8 mb-3">Neueste Stylebooks</h2>
        @if($latest->isEmpty())
            <p>Noch keine Inhalte vorhanden.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($latest as $sb)
                    <a class="block p-4 border rounded bg-white hover:shadow transition"
                       href="{{ auth()->check() ? route('stylebooks.show', $sb) : route('login') }}">
                        <h3 class="font-semibold">{{ $sb->title }}</h3>
                        <p class="text-sm text-gray-600">von {{ $sb->user->name }}</p>
                    </a>
                @endforeach
            </div>
        @endif
    @endisset
</main>
</body>
</html>
