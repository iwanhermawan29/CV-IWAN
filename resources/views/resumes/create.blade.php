<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Create Resume') }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">
                <form action="{{ route('resumes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block font-medium">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama') }}"
                            class="w-full border rounded px-3 py-2" />
                        @error('nama')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Posisi</label>
                        <input type="text" name="posisi" value="{{ old('posisi') }}"
                            class="w-full border rounded px-3 py-2" />
                        @error('posisi')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Negara</label>
                        <input type="text" name="negara" value="{{ old('negara') }}"
                            class="w-full border rounded px-3 py-2" />
                        @error('negara')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Image Resume</label>
                        <input type="file" name="image_resume" class="w-full" />
                        @error('image_resume')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('resumes.index') }}" class="mr-4 text-gray-600 hover:underline">Cancel</a>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
