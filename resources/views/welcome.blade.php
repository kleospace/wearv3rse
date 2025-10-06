<x-guest-layout>
    <div class="max-w-4xl mx-auto py-8 space-y-10">
        <h1 class="text-2xl font-bold">Welcome to wearV3rse</h1>

        <div>
            <h2 class="font-semibold mb-2">Latest Stylebooks</h2>
            <ul class="list-disc pl-5">
                @foreach($stylebooks as $s)
                    <li>
                        <a class="underline" href="{{ route('stylebooks.show', $s) }}">{{ $s->title }}</a>
                        <span class="text-sm opacity-70">by {{ $s->user->name }}</span>
                    </li>
                @endforeach
            </ul>
            <a class="underline text-sm" href="{{ route('stylebooks.landing') }}">All stylebooks →</a>
        </div>

        <div>
            <h2 class="font-semibold mb-2">Latest Articles</h2>
            <ul class="list-disc pl-5">
                @foreach($articles as $a)
                    <li>
                        <a class="underline" href="{{ route('articles.show', $a) }}">{{ $a->title }}</a>
                        <span class="text-sm opacity-70">by {{ $a->author->name }}</span>
                    </li>
                @endforeach
            </ul>
            <a class="underline text-sm" href="{{ route('articles.landing') }}">All articles →</a>
        </div>
    </div>
</x-guest-layout>
