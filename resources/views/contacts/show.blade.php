<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('View Contact') }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">
                <div class="space-y-4">
                    <p><strong>Name:</strong> {{ $contact->name }}</p>
                    <p><strong>Email:</strong> {{ $contact->email }}</p>
                    <p><strong>Subject:</strong> {{ $contact->subject ?? '-' }}</p>
                    <p><strong>Message:</strong></p>
                    <p>{!! nl2br(e($contact->message)) !!}</p>
                    <p><strong>Received:</strong> {{ $contact->created_at->format('d-m-Y H:i') }}</p>
                </div>
                <div class="mt-6">
                    <a href="{{ route('contacts.index') }}" class="text-blue-600 hover:underline">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
