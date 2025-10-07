<x-guest-layout>
    <div class="mx-auto max-w-3xl p-6">
        <a href="{{ route('articles.landing') }}" class="text-sm text-indigo-600 hover:underline">← Back</a>

        <article class="mt-4 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h1 class="text-3xl font-bold">{{ $article->title }}</h1>
            <div class="text-sm text-slate-500">by {{ $article->author->name }} · {{ $article->created_at->format('M d, Y') }}</div>
            <div class="prose prose-slate mt-6 max-w-none">
                <p class="whitespace-pre-line">{{ $article->content }}</p>
            </div>
        </article>
    </div>
</x-guest-layout>
