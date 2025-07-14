<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Add New Skill') }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">
                <form action="{{ route('skills.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block font-medium">Skill Name</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="w-full border rounded px-3 py-2" />
                        @error('name')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium">Percentage</label>
                        <input type="number" name="percentage" value="{{ old('percentage') }}" min="0"
                            max="100" class="w-full border rounded px-3 py-2" />
                        @error('percentage')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex justify-end">
                        <a href="{{ route('skills.index') }}" class="mr-4 text-gray-600 hover:underline">Cancel</a>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
