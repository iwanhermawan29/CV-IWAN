<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('View Resume') }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6 prose">
                <h1 class="text-2xl font-bold mb-4">{{ $resume->nama }}</h1>

                @if ($resume->image_resume)
                    <img src="{{ asset('storage/' . $resume->image_resume) }}" class="mb-4 w-48 h-auto rounded shadow"
                        alt="">
                @endif

                <p><strong>Posisi:</strong> {{ $resume->posisi }}</p>
                <p><strong>Negara:</strong> {{ $resume->negara }}</p>
                <p><strong>Created At:</strong> {{ $resume->created_at->format('d-m-Y H:i') }}</p>
                <p><strong>Created By:</strong> {{ $resume->creator->name ?? '-' }}</p>
                <p><strong>Updated At:</strong>
                    {{ $resume->updated_at ? $resume->updated_at->format('d-m-Y H:i') : '-' }}</p>
                <p><strong>Updated By:</strong> {{ $resume->updater->name ?? '-' }}</p>

                <div class="mt-6">
                    <a href="{{ route('resumes.index') }}" class="text-gray-600 hover:underline">← Back to list</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
