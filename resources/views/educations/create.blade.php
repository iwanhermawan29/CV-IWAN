<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($education) ? 'Edit Education' : 'Add Education' }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">
                <form
                    action="{{ isset($education) ? route('educations.update', $education) : route('educations.store') }}"
                    method="POST">
                    @csrf
                    @isset($education)
                        @method('PUT')
                    @endisset

                    <div class="mb-4">
                        <label class="block font-medium">Degree</label>
                        <input type="text" name="degree" value="{{ old('degree', $education->degree ?? '') }}"
                            class="w-full border rounded px-3 py-2">
                        @error('degree')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium">Institution</label>
                        <input type="text" name="institution"
                            value="{{ old('institution', $education->institution ?? '') }}"
                            class="w-full border rounded px-3 py-2">
                        @error('institution')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block font-medium">Start Year</label>
                            <input type="number" name="start_year"
                                value="{{ old('start_year', $education->start_year ?? '') }}"
                                class="w-full border rounded px-3 py-2">
                            @error('start_year')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block font-medium">End Year</label>
                            <input type="number" name="end_year"
                                value="{{ old('end_year', $education->end_year ?? '') }}"
                                class="w-full border rounded px-3 py-2">
                            @error('end_year')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium">Description</label>
                        <textarea name="description" rows="4" class="w-full border rounded px-3 py-2">{{ old('description', $education->description ?? '') }}</textarea>
                        @error('description')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium">Order</label>
                        <input type="number" name="order" value="{{ old('order', $education->order ?? 0) }}"
                            class="w-full border rounded px-3 py-2">
                        @error('order')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('educations.index') }}" class="mr-4 text-gray-600 hover:underline">Cancel</a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            {{ isset($education) ? 'Update' : 'Save' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
