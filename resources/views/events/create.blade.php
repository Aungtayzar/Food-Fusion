<x-layout>
    <x-left-side-bar>
    <div class="container py-4">
        <div class="flex justify-center">
            <div class="w-full max-w-2xl">
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-800">Create New Event</h2>
                    </div>
                    <div class="p-6">
                        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="mb-4">
                                <x-inputs.text name="title" id="title" label="Title" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500" placeholder="Enter Title"/>
                            </div>
                            
                            <div class="mb-4">
                                <x-inputs.text-area label="Description" name="description" id="description" placeholder="Write Something..." />
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <x-inputs.date-time name="start_date" id="start_date" label="Start Date & Time"   />
                                </div>
                                
                                <div>
                                    <x-inputs.date-time name="end_date" id="end_date" label="End Date & Time (Optional)"  />
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <x-inputs.text name="location" id="location" label="Location (Optional)" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500" placeholder="Enter Location..."/>
                            </div>
                            
                            <div class="mb-4">
                                <x-inputs.file label="Event Image (Optional)" name="image" id="image" />
                            </div>
                            
                            <div class="mb-4 flex items-center">
                                <x-inputs.check-box name="is_featured" id="is_featured" label="Feature this event" />
                            </div>
                            
                            <div class="flex items-center space-x-4 mt-6">
                                <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Create Event</button>
                                <a href="{{ route('events.index') }}" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-left-side-bar>
</x-layout>