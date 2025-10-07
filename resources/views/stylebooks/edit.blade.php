<x-app-layout>
    <div class="max-w-md mx-auto py-8">
        <h1 class="text-xl font-bold mb-4">Edit Stylebook</h1>

        <form method="POST" action="{{ route('stylebooks.update',$stylebook) }}" class="space-y-3">
            @csrf @method('PUT')

            <div>
                <label class="block text-sm">Title</label>
                <input name="title" value="{{ old('title',$stylebook->title) }}" class="w-full border rounded p-2">
                @error('title') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
            </div>

            <div>
                <label class="block text-sm">Description</label>
                <textarea name="description" rows="4" class="w-full border rounded p-2">{{ old('description',$stylebook->description) }}</textarea>
                @error('description') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
            </div>

            <button class="px-3 py-1 rounded bg-black text-white">Update</button>
        </form>
    </div>
</x-app-layout>
