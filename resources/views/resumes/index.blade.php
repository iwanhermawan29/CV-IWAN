<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Resume Management') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end mb-4">
                <a href="{{ route('resumes.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                    + New Resume
                </a>
            </div>

            @if (session('success'))
                <div class="mb-4 text-green-600">{{ session('success') }}</div>
            @endif

            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="overflow-x-auto"> <!-- membuat tabel dapat digeser horizontal -->
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Image</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Posisi</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Negara</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Created At</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Created By</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Updated At</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Updated By</th>
                                <th class="px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($resumes as $resume)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($resume->image_resume)
                                            <img src="{{ asset('storage/' . $resume->image_resume) }}" alt=""
                                                class="w-16 h-16 object-cover rounded">
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $resume->nama }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $resume->posisi }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $resume->negara }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $resume->created_at->format('d-m-Y H:i') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $resume->creator->name ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $resume->updated_at ? $resume->updated_at->format('d-m-Y H:i') : '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $resume->updater->name ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                        <a href="{{ route('resumes.show', $resume) }}"
                                            class="text-blue-600 hover:text-blue-800">View</a>
                                        <a href="{{ route('resumes.edit', $resume) }}"
                                            class="text-yellow-600 hover:text-yellow-800">Edit</a>
                                        <form action="{{ route('resumes.destroy', $resume) }}" method="POST"
                                            class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" onclick="return confirm('Delete this resume?')"
                                                class="text-red-600 hover:text-red-800">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="px-6 py-4 text-center text-gray-500">No resumes found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-4">
                    {{ $resumes->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
