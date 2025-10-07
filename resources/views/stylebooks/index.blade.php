<x-app-layout>
    <div class="max-w-3xl mx-auto py-8">
        <div class="flex items-center justify-between">
            <h1 class="text-xl font-bold">My Stylebooks</h1>
            <a href="{{ route('stylebooks.create') }}" class="px-3 py-1 rounded bg-black text-white">New</a>
        </div>

        @if (session('status'))
            <div class="mt-4 p-2 bg-green-100 rounded">{{ session('status') }}</div>
        @endif

        <ul class="mt-4 space-y-2">
            @foreach($stylebooks as $s)
                <li class="border rounded p-3 flex justify-between">
                    <div>
                        <a class="font-semibold underline" href="{{ route('stylebooks.show',$s) }}">{{ $s->title }}</a>
                        <div class="text-sm opacity-70">{{ $s->created_at->format('Y-m-d') }}</div>
                    </div>
                    <div class="flex gap-2">
                        <a class="underline text-sm" href="{{ route('stylebooks.edit',$s) }}">Edit</a>
                        <form method="POST" action="{{ route('stylebooks.destroy',$s) }}">
                            @csrf @method('DELETE')
                            <button class="underline text-sm">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>

        <div class="mt-6">{{ $stylebooks->links() }}</div>
    </div>
</x-app-layout>
