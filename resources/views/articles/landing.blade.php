<x-guest-layout>
    <div class="max-w-5xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Neueste Artikel</h1>

        @if($latest->isEmpty())
            <p>Noch keine Artikel vorhanden.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($latest as $a)
                    <div class="p-4 border rounded bg-white">
                        <h2 class="font-semibold">{{ $a->title }}</h2>
                        <p class="text-sm text-gray-600">von {{ $a->author->name }}</p>
                        @if($a->content)
                            <p class="text-gray-700 mt-2">{{ \Illuminate\Support\Str::limit($a->content, 120) }}</p>
                        @endif
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $latest->links() }}
            </div>
        @endif
    </div>
</x-guest-layout>
