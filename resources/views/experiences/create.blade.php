<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Add Experience') }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">
                <form action="{{ route('experiences.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block font-medium">Title</label>
                        <input type="text" name="title" value="{{ old('title') }}"
                            class="w-full border rounded px-3 py-2" />
                        @error('title')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium">Company</label>
                        <input type="text" name="company" value="{{ old('company') }}"
                            class="w-full border rounded px-3 py-2" />
                        @error('company')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block font-medium">Start Year</label>
                            <input type="number" name="start_year" value="{{ old('start_year') }}"
                                class="w-full border rounded px-3 py-2" />
                            @error('start_year')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block font-medium">End Year</label>
                            <input type="number" name="end_year" value="{{ old('end_year') }}"
                                class="w-full border rounded px-3 py-2" />
                            @error('end_year')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium">Description</label>
                        <textarea name="description" rows="4" class="w-full border rounded px-3 py-2">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium">Order</label>
                        <input type="number" name="order" value="{{ old('order', 0) }}"
                            class="w-full border rounded px-3 py-2" />
                        @error('order')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex justify-end">
                        <a href="{{ route('experiences.index') }}"
                            class="mr-4 text-gray-600 hover:underline">Cancel</a>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
