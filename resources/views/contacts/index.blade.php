<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Contact Messages') }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 text-green-600">{{ session('success') }}</div>
            @endif
            <div class="bg-white shadow sm:rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Subject</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Date</th>
                            <th class="px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($contacts as $contact)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $contact->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $contact->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $contact->subject ?? '-' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $contact->created_at->format('d-m-Y H:i') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                    <a href="{{ route('contacts.show', $contact) }}"
                                        class="text-blue-600 hover:underline">View</a>
                                    <a href="{{ route('contacts.edit', $contact) }}"
                                        class="text-yellow-600 hover:underline">Edit</a>
                                    <form action="{{ route('contacts.destroy', $contact) }}" method="POST"
                                        class="inline">
                                        @csrf @method('DELETE')
                                        <button onclick="return confirm('Delete?')"
                                            class="text-red-600 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">No messages found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="p-4">{{ $contacts->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
