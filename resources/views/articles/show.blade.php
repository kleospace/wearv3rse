<x-guest-layout>
    <div class="max-w-2xl mx-auto py-8">
        <a href="{{ route('articles.landing') }}" class="underline text-sm">&larr; back</a>

        <h1 class="text-2xl font-bold mt-2">{{ $article->title }}</h1>
        <div class="opacity-70 text-sm">by {{ $article->author->name }}</div>
        <p class="mt-4 whitespace-pre-line">{{ $article->content }}</p>
    </div>
</x-guest-layout>
