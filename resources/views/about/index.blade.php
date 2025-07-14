<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">About Management</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end mb-4">
                <a href="{{ route('abouts.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                    + New About
                </a>
            </div>

            @if (session('success'))
                <div class="mb-4 text-green-600">{{ session('success') }}</div>
            @endif

            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Title</th>
                            <th class="px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($abouts as $about)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $about->title ?? '-' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                    <a href="{{ route('abouts.show', $about) }}"
                                        class="text-blue-600 hover:text-blue-800">View</a>
                                    <a href="{{ route('abouts.edit', $about) }}"
                                        class="text-yellow-600 hover:text-yellow-800">Edit</a>
                                    <form action="{{ route('abouts.destroy', $about) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800"
                                            onclick="return confirm('Delete this entry?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="px-6 py-4 text-center text-gray-500">No entries found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="p-4">{{ $abouts->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
