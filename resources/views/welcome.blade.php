<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>wearV3rse – Willkommen</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

<!-- HEADER-BALKEN -->
<header class="bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 h-14 flex items-center justify-between">
        <a href="{{ route('welcome') }}" class="font-bold text-lg">wearV3rse</a>

        <nav class="flex items-center gap-6 text-sm">
            <a href="{{ route('stylebooks.landing') }}" class="hover:text-indigo-300">Stylebooks</a>
            <a href="{{ route('articles.landing') }}" class="hover:text-indigo-300">Articles</a>

            @auth
                <span class="opacity-90">Hi, {{ auth()->user()->name }}</span>
                <a href="{{ route('stylebooks.index') }}" class="px-3 py-1.5 rounded bg-indigo-600 hover:bg-indigo-700 text-white">Meine Stylebooks</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button class="px-3 py-1.5 rounded border border-white/30 hover:bg-white/10">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hover:text-indigo-300">Login</a>
                <a href="{{ route('register') }}" class="px-3 py-1.5 rounded bg-indigo-600 hover:bg-indigo-700 text-white">Registrieren</a>
            @endauth
        </nav>
    </div>
</header>

<!-- HERO-BEREICH -->
<main class="flex-1">
    <section class="bg-gradient-to-r from-indigo-50 to-violet-50 border-b">
        <div class="max-w-7xl mx-auto px-4 py-16">
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-gray-900">
                Willkommen bei WearV3rse
            </h1>
            <p class="mt-4 max-w-2xl text-lg text-gray-700">
                Entdecke Stylebooks und Artikel der Community. Melde dich an, um Inhalte zu sehen und zu erstellen.
            </p>

            <div class="mt-8 flex flex-wrap gap-3">
                <a href="{{ route('stylebooks.landing') }}"
                   class="px-5 py-3 rounded bg-indigo-600 text-white hover:bg-indigo-700">
                    Zu den Stylebooks (Login)
                </a>
                <a href="{{ route('articles.landing') }}"
                   class="px-5 py-3 rounded bg-violet-600 text-white hover:bg-violet-700">
                    Zu den Artikeln (Login)
                </a>
                @guest
                    <a href="{{ route('login') }}"
                       class="px-5 py-3 rounded border border-gray-300 text-gray-800 hover:bg-white/50">
                        Einloggen
                    </a>
                @endguest
            </div>
        </div>
    </section>

    <!-- Optionaler Teaser-Block -->
    <section>
        <div class="max-w-7xl mx-auto px-4 py-12 grid gap-6 md:grid-cols-3">
            <div class="p-6 rounded-lg bg-white border">
                <h3 class="font-semibold text-lg">Stylebooks</h3>
                <p class="mt-2 text-gray-600">Kuratiere Outfits, Looks und Inspiration – alles an einem Ort.</p>
            </div>
            <div class="p-6 rounded-lg bg-white border">
                <h3 class="font-semibold text-lg">Artikel</h3>
                <p class="mt-2 text-gray-600">Schreibe Beiträge, Guides und News rund um digitale Fashion.</p>
            </div>
            <div class="p-6 rounded-lg bg-white border">
                <h3 class="font-semibold text-lg">Community</h3>
                <p class="mt-2 text-gray-600">Folge anderen, kommentiere und teile deine Ideen.</p>
            </div>
        </div>
    </section>
</main>

<!-- FOOTER-BALKEN -->
<footer class="bg-gray-900 text-gray-300">
    <div class="max-w-7xl mx-auto px-4 py-6 flex flex-col md:flex-row items-center justify-between gap-3">
        <p class="text-sm">© {{ date('Y') }} wearV3rse. Alle Rechte vorbehalten.</p>
        <div class="flex items-center gap-4 text-sm">
            <a href="{{ route('welcome') }}" class="hover:text-white">Home</a>
            <a href="{{ route('stylebooks.landing') }}" class="hover:text-white">Stylebooks</a>
            <a href="{{ route('articles.landing') }}" class="hover:text-white">Articles</a>
        </div>
    </div>
</footer>
</body>
</html>
