<x-guest-layout>
    <div class="mx-auto max-w-6xl p-6">

        {{-- Hero --}}
        <section class="rounded-2xl bg-gradient-to-r from-indigo-500 to-purple-500 text-white p-8 mb-10">
            <h1 class="text-3xl font-bold">wearV3rse</h1>
            <p class="mt-2 opacity-90">Fashion meets Code – entdecke Stylebooks & Artikel von der Community.</p>
            <div class="mt-6 flex gap-3">
                <a href="{{ route('stylebooks.landing') }}" class="rounded-xl bg-white/10 px-4 py-2 hover:bg-white/20">Browse Stylebooks</a>
                <a href="{{ route('articles.landing') }}" class="rounded-xl bg-white px-4 py-2 text-indigo-700 font-medium">Read Articles</a>
            </div>
        </section>

        {{-- Latest Stylebooks --}}
        <section class="mb-12">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold">Latest Stylebooks</h2>
                <a class="text-sm text-indigo-600 hover:underline" href="{{ route('stylebooks.landing') }}">Alle ansehen →</a>
            </div>

            @if($stylebooks->isEmpty())
                <p class="text-sm opacity-60">Noch keine Stylebooks.</p>
            @else
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($stylebooks as $s)
                        <a href="{{ route('stylebooks.show',$s) }}"
                           class="block rounded-2xl border border-slate-200 bg-white p-5 shadow-sm hover:shadow-md transition">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="h-10 w-10 rounded-full bg-indigo-100 text-indigo-700 grid place-items-center font-semibold">
                                    {{ Str::of($s->user->name)->explode(' ')->take(2)->map(fn($w)=>Str::substr($w,0,1))->implode('') }}
                                </div>
                                <div>
                                    <div class="text-sm text-slate-500">by {{ $s->user->name }}</div>
                                    <div class="text-xs text-slate-400">{{ $s->created_at->diffForHumans() }}</div>
                                </div>
                            </div>
                            <h3 class="font-semibold mb-1 line-clamp-1">{{ $s->title }}</h3>
                            <p class="text-sm text-slate-600 line-clamp-2">{{ $s->description }}</p>
                        </a>
                    @endforeach
                </div>
            @endif
        </section>

        {{-- Latest Articles --}}
        <section>
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold">Latest Articles</h2>
                <a class="text-sm text-indigo-600 hover:underline" href="{{ route('articles.landing') }}">Alle ansehen →</a>
            </div>

            @if($articles->isEmpty())
                <p class="text-sm opacity-60">Noch keine Artikel.</p>
            @else
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($articles as $a)
                        <a href="{{ route('articles.show',$a) }}"
                           class="block rounded-2xl border border-slate-200 bg-white p-5 shadow-sm hover:shadow-md transition">
                            <div class="mb-2 text-xs text-slate-500">{{ $a->created_at->format('M d, Y') }}</div>
                            <h3 class="font-semibold mb-1 line-clamp-2">{{ $a->title }}</h3>
                            <p class="text-sm text-slate-600 line-clamp-2">{{ Str::limit($a->content, 120) }}</p>
                            <div class="mt-3 text-xs text-slate-500">by {{ $a->author->name }}</div>
                        </a>
                    @endforeach
                </div>
            @endif
        </section>

    </div>
</x-guest-layout>
