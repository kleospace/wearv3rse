<x-guest-layout>
    <section class="bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 py-14">
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-gray-900">
                Willkommen bei WearV3rse
            </h1>
            <p class="mt-4 max-w-2xl text-lg text-gray-700">
                Entdecke Stylebooks und Artikel der Community. Melde dich an, um Inhalte zu sehen und zu erstellen.
            </p>

            <div class="mt-8 flex flex-wrap gap-3">
                <a href="{{ route('stylebooks.landing') }}"
                   class="px-5 py-3 rounded bg-indigo-600 text-white hover:bg-indigo-700">
                    Zu den Stylebooks
                </a>
                <a href="{{ route('articles.landing') }}"
                   class="px-5 py-3 rounded bg-violet-600 text-white hover:bg-violet-700">
                    Zu den Artikeln
                </a>
                @guest
                    <a href="{{ route('login') }}"
                       class="px-5 py-3 rounded border border-gray-300 text-gray-800 hover:bg-white/50">
                        Login
                    </a>
                @endguest
            </div>
        </div>
    </section>
</x-guest-layout>
