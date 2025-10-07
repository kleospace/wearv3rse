<x-guest-layout>
    <div class="mx-auto max-w-6xl p-6">
        <h1 class="text-2xl font-bold mb-6">All Stylebooks</h1>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($latest as $s)
                <a href="{{ route('stylebooks.show',$s) }}"
                   class="block rounded-2xl border border-slate-200 bg-white p-5 shadow-sm hover:shadow-md transition">
                    <h3 class="font-semibold mb-1 line-clamp-1">{{ $s->title }}</h3>
                    <p class="text-sm text-slate-600 line-clamp-2">{{ $s->description }}</p>
                    <div class="mt-3 text-xs text-slate-500">by {{ $s->user->name }} · {{ $s->created_at->diffForHumans() }}</div>
                </a>
            @endforeach
        </div>

        <div class="mt-8">{{ $latest->links() }}</div>
    </div>
</x-guest-layout>
