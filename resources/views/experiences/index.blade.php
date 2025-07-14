<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Work Experience') }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end mb-4">
                <a href="{{ route('experiences.create') }}"
                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ New Experience</a>
            </div>
            @if (session('success'))
                <div class="text-green-600 mb-4">{{ session('success') }}</div>
            @endif
            <div class="bg-white shadow sm:rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Company</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Years</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Order</th>
                            <th class="px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($experiences as $exp)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $exp->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $exp->company }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $exp->start_year }} -
                                    {{ $exp->end_year ?? 'Present' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $exp->order }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right space-x-2">
                                    <a href="{{ route('experiences.edit', $exp) }}"
                                        class="text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route('experiences.destroy', $exp) }}" method="POST"
                                        class="inline">
                                        @csrf @method('DELETE')
                                        <button onclick="return confirm('Delete this experience?')"
                                            class="text-red-600 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">No experiences found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
