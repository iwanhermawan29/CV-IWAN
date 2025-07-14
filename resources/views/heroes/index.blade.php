<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Hero Slides') }}</h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end mb-4">
                <a href="{{ route('heroes.create') }}" class="bg-green-600 text-white px-4 py-2 rounded">+ New Slide</a>
            </div>
            @if (session('success'))
                <div class="mb-4 text-green-600">{{ session('success') }}</div>
            @endif
            <div class="bg-white shadow sm:rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th>Order</th>
                            <th>Background</th>
                            <th>Heading</th>
                            <th>Subheading</th>
                            <th>Button Text</th>
                            <th>Button URL</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($heroes as $hero)
                            <tr>
                                <td class="px-4 py-2">{{ $hero->order }}</td>
                                <td class="px-4 py-2">{{ $hero->background_image }}</td>
                                <td class="px-4 py-2">{{ $hero->heading }}</td>
                                <td class="px-4 py-2">{{ $hero->subheading }}</td>
                                <td class="px-4 py-2">{{ $hero->button_text }}</td>
                                <td class="px-4 py-2"><a href="{{ $hero->button_url }}" target="_blank">Link</a></td>
                                <td class="px-4 py-2 text-right space-x-2">
                                    <a href="{{ route('heroes.edit', $hero) }}" class="text-blue-600">Edit</a>
                                    <form action="{{ route('heroes.destroy', $hero) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button onclick="return confirm('Remove slide?')"
                                            class="text-red-600">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">No slides found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
