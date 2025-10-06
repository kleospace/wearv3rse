<x-guest-layout>
    <div class="max-w-5xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Neueste Stylebooks</h1>

        @if($latest->isEmpty())
            <p>Noch keine Stylebooks vorhanden.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($latest as $sb)
                    <a class="block p-4 border rounded bg-white hover:shadow transition"
                       href="{{ auth()->check() ? route('stylebooks.show', $sb) : route('login') }}">
                        <h2 class="font-semibold">{{ $sb->title }}</h2>
                        <p class="text-sm text-gray-600">von {{ $sb->user->name }}</p>
                    </a>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $latest->links() }}
            </div>
        @endif
    </div>
</x-guest-layout>
