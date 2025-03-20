<x-layout>
    <x-left-side-bar>
    <div class="container py-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Events Management</h1>
            <a href="{{ route('events.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded">Add New Event</a>
        </div>

        <div class="bg-white rounded-lg shadow">
            <div class="p-6">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">End Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Featured</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($events as $event)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">{{ $event->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $event->start_date->format('M d, Y H:i') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $event->end_date ? $event->end_date->format('M d, Y H:i') : 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $event->location ?? 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {!! $event->is_featured ? 
                                        '<span class="inline-flex px-2 py-1 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">Yes</span>' : 
                                        '<span class="inline-flex px-2 py-1 text-xs font-semibold leading-5 text-gray-800 bg-gray-100 rounded-full">No</span>' !!}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('events.show', $event->id) }}" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded bg-blue-100 hover:bg-blue-200 text-blue-800">View</a>
                                        <a href="{{ route('events.edit', $event->id) }}" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded bg-yellow-100 hover:bg-yellow-200 text-yellow-800">Edit</a>
                                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded bg-red-100 hover:bg-red-200 text-red-800" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">No events found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                
                <div class="mt-4">
                    {{ $events->links() }}
                </div>
            </div>
        </div>
    </div>
    </x-left-side-bar>
</x-layout>