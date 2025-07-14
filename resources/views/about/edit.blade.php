<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit About</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">
                <form action="{{ route('abouts.update', $about) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')

                    <div class="mb-4">
                        <label class="block font-medium">Title</label>
                        <input type="text" name="title" value="{{ old('title', $about->title) }}"
                            class="w-full border rounded px-3 py-2">
                        @error('title')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Description</label>
                        <textarea name="description" rows="5" class="w-full border rounded px-3 py-2">{{ old('description', $about->description) }}</textarea>
                        @error('description')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Image</label>
                        <input type="file" name="image">
                        @if ($about->image_path)
                            <img src="{{ asset('storage/' . $about->image_path) }}" class="mt-2 w-32 rounded shadow"
                                alt="">
                        @endif
                        @error('image')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('abouts.index') }}" class="mr-4 text-gray-600 hover:underline">Cancel</a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
