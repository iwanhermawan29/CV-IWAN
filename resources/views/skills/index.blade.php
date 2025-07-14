<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Skills Management') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end mb-4">
                <a href="{{ route('skills.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                    + New Skill
                </a>
            </div>

            @if (session('success'))
                <div class="mb-4 text-green-600">{{ session('success') }}</div>
            @endif

            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Percentage</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Created At</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Created By</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Updated At</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Updated By</th>
                                <th class="px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($skills as $skill)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $skill->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $skill->percentage }}%</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $skill->created_at->format('d-m-Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $skill->creator->name ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $skill->updated_at ? $skill->updated_at->format('d-m-Y') : '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $skill->updater->name ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                        <a href="{{ route('skills.edit', $skill) }}"
                                            class="text-yellow-600 hover:text-yellow-800">Edit</a>
                                        <form action="{{ route('skills.destroy', $skill) }}" method="POST"
                                            class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" onclick="return confirm('Remove this skill?')"
                                                class="text-red-600 hover:text-red-800">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-4 text-center text-gray-500">No skills found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-4">
                    {{ $skills->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
