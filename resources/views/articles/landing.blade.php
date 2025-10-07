<x-guest-layout>
    <div class="max-w-4xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Articles</h1>
        <div class="space-y-3">
            @foreach($latest as $a)
                <a class="block border rounded p-3" href="{{ route('articles.show',$a) }}">
                    <div class="font-semibold">{{ $a->title }}</div>
                    <div class="text-sm opacity-70">by {{ $a->author->name }}</div>
                </a>
            @endforeach
        </div>
        <div class="mt-6">{{ $latest->links() }}</div>
    </div>
</x-guest-layout>
