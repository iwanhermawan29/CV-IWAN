<x-app-layout>
    <x-slot name="header">
        <h2>{{ isset($hero) ? 'Edit Slide' : 'Add Slide' }}</h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">
                <form action="{{ isset($hero) ? route('heroes.update', $hero) : route('heroes.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @isset($hero)
                        @method('PUT')
                    @endisset
                    <div class="mb-4">

                        <div class="mb-4">
                            <label>Background Image</label>
                            <input type="file" name="background_image" class="w-full border rounded px-2 py-1" />
                            @error('background_image')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4">
                        <label>Heading</label>
                        <input type="text" name="heading" value="{{ old('heading', $hero->heading ?? '') }}"
                            class="w-full border rounded px-2 py-1" />
                        @error('heading')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label>Subheading</label>
                        <input type="text" name="subheading" value="{{ old('subheading', $hero->subheading ?? '') }}"
                            class="w-full border rounded px-2 py-1" />
                        @error('subheading')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label>Button Text</label>
                        <input type="text" name="button_text"
                            value="{{ old('button_text', $hero->button_text ?? '') }}"
                            class="w-full border rounded px-2 py-1" />
                        @error('button_text')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label>Button URL</label>
                        <input type="url" name="button_url" value="{{ old('button_url', $hero->button_url ?? '') }}"
                            class="w-full border rounded px-2 py-1" />
                        @error('button_url')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label>Order</label>
                        <input type="number" name="order" value="{{ old('order', $hero->order ?? 0) }}"
                            class="w-full border rounded px-2 py-1" />
                        @error('order')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex justify-end">
                        <a href="{{ route('heroes.index') }}" class="mr-4 text-gray-600">Cancel</a>
                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded">{{ isset($hero) ? 'Update' : 'Save' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
