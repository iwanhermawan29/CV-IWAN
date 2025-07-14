<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">View About</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6 prose">
                <h1>{{ $about->title }}</h1>

                @if ($about->image_path)
                    <img src="{{ asset('storage/' . $about->image_path) }}" class="my-4 rounded shadow" alt="">
                @endif

                {!! nl2br(e($about->description)) !!}

                <div class="mt-6">
                    <a href="{{ route('abouts.index') }}" class="text-gray-600 hover:underline">← Back to list</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
