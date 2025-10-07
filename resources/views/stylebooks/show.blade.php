<x-app-layout>
    <div class="max-w-2xl mx-auto py-8">
        <a href="{{ route('stylebooks.index') }}" class="underline text-sm">&larr; back</a>

        <h1 class="text-2xl font-bold mt-2">{{ $stylebook->title }}</h1>
        <div class="opacity-70 text-sm">by {{ $stylebook->user->name }}</div>

        <p class="mt-4">{{ $stylebook->description }}</p>
    </div>
</x-app-layout>
