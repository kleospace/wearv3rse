<x-app-layout>
    <div class="mx-auto max-w-3xl p-6">
        <a href="{{ route('stylebooks.landing') }}" class="text-sm text-indigo-600 hover:underline">← Back</a>

        <div class="mt-4 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h1 class="text-2xl font-bold">{{ $stylebook->title }}</h1>
            <div class="text-sm text-slate-500">by {{ $stylebook->user->name }} · {{ $stylebook->created_at->format('M d, Y') }}</div>
            <p class="mt-4 text-slate-700 whitespace-pre-line">{{ $stylebook->description }}</p>
        </div>
    </div>
</x-app-layout>
