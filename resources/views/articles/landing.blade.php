<x-guest-layout>
    <div class="mx-auto max-w-6xl p-6">
        <h1 class="text-2xl font-bold mb-6">All Articles</h1>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($latest as $a)
                <a href="{{ route('articles.show',$a) }}"
                   class="block rounded-2xl border border-slate-200 bg-white p-5 shadow-sm hover:shadow-md transition">
                    <div class="text-xs text-slate-500 mb-2">{{ $a->created_at->format('M d, Y') }}</div>
                    <h3 class="font-semibold mb-1 line-clamp-2">{{ $a->title }}</h3>
                    <p class="text-sm text-slate-600 line-clamp-2">{{ Str::limit($a->content, 140) }}</p>
                    <div class="mt-3 text-xs text-slate-500">by {{ $a->author->name }}</div>
                </a>
            @endforeach
        </div>

        <div class="mt-8">{{ $latest->links() }}</div>
    </div>
</x-guest-layout>
