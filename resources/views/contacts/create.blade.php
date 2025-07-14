<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('New Contact') }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">
                <form action="{{ route('contacts.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block font-medium">Name</label>
                        <input name="name" value="{{ old('name') }}" class="w-full border rounded px-3 py-2" />
                        @error('name')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium">Email</label>
                        <input name="email" type="email" value="{{ old('email') }}"
                            class="w-full border rounded px-3 py-2" />
                        @error('email')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium">Subject</label>
                        <input name="subject" value="{{ old('subject') }}" class="w-full border rounded px-3 py-2" />
                        @error('subject')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium">Message</label>
                        <textarea name="message" rows="4" class="w-full border rounded px-3 py-2">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex justify-end">
                        <a href="{{ route('contacts.index') }}" class="mr-4 text-gray-600 hover:underline">Cancel</a>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
