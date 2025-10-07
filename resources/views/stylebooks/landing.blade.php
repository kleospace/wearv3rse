<x-guest-layout>
    <div class="max-w-4xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Stylebooks</h1>

        <div class="grid gap-4">
            @foreach($latest as $s)
                <a class="block border rounded p-3" href="{{ route('stylebooks.show', $s) }}">
                    <div class="font-semibold">{{ $s->title }}</div>
                    <div class="text-sm opacity-70">by {{ $s->user->name }}</div>
                </a>
            @endforeach
        </div>

        <div class="mt-6">{{ $latest->links() }}</div>
    </div>
</x-guest-layout>
