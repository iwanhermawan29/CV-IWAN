<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Education') }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end mb-4">
                <a href="{{ route('educations.create') }}"
                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ New</a>
            </div>
            @if (session('success'))
                <div class="text-green-600 mb-4">{{ session('success') }}</div>
            @endif
            <div class="bg-white shadow sm:rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Degree</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Institution</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Years</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Order</th>
                            <th class="px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($educations as $edu)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $edu->degree }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $edu->institution }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $edu->start_year }} -
                                    {{ $edu->end_year ?? 'Present' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $edu->order }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <a href="{{ route('educations.edit', $edu) }}"
                                        class="text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route('educations.destroy', $edu) }}" method="POST"
                                        class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" onclick="return confirm('Delete?')"
                                            class="text-red-600 hover:underline ml-2">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">No entries.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
