<x-layout>
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white">
    <div class="container py-8 px-4 mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <div class="lg:col-span-8">
                <article class="bg-white rounded-2xl shadow-sm p-6">
                    <h1 class="text-4xl font-bold mb-6 text-gray-800 leading-tight flex items-center gap-3">
                        <i class="fa-solid fa-calendar-check text-blue-500"></i>
                        {{ $event->title }}
                    </h1>
                    
                    @if($event->image_path)
                    <div class="mb-8 relative h-[400px] rounded-xl overflow-hidden">
                        <img src="{{ asset('storage/' . $event->image_path) }}" 
                             alt="{{ $event->title }}" 
                             class="absolute inset-0 w-full h-full object-cover transform hover:scale-105 transition duration-500">
                    </div>
                    @endif
                    
                    <div class="mb-8">
                        <div class="bg-blue-50 rounded-xl shadow-sm border border-blue-100">
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="bg-white p-4 rounded-lg shadow-sm">
                                        <h5 class="text-blue-600 text-sm font-semibold mb-2 flex items-center gap-2">
                                            <i class="fa-regular fa-clock"></i> Date & Time
                                        </h5>
                                        <p class="flex items-center space-x-2 text-gray-700">
                                            <i class="fa-regular fa-calendar-days text-blue-500"></i>
                                            <span>{{ $event->start_date->format('F d, Y - h:i A') }}</span>
                                        </p>
                                        @if($event->end_date)
                                            <p class="flex items-center space-x-2 mt-2 text-gray-700">
                                                <i class="fa-solid fa-calendar-check text-blue-500"></i>
                                                <span>End: {{ $event->end_date->format('F d, Y - h:i A') }}</span>
                                            </p>
                                        @endif
                                    </div>
                                    
                                    @if($event->location)
                                    <div class="bg-white p-4 rounded-lg shadow-sm">
                                        <h5 class="text-blue-600 text-sm font-semibold mb-2 flex items-center gap-2">
                                            <i class="fa-solid fa-map-marker"></i> Location
                                        </h5>
                                        <p class="flex items-center space-x-2 text-gray-700">
                                            <i class="fa-solid fa-location-dot text-blue-500"></i>
                                            <span>{{ $event->location }}</span>
                                        </p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="event-description bg-white rounded-xl p-6">
                        <h4 class="text-2xl font-semibold mb-4 text-gray-800 flex items-center gap-2">
                            <i class="fa-solid fa-circle-info text-blue-500"></i>
                            About This Event
                        </h4>
                        <div class="prose max-w-none text-gray-600 leading-relaxed">
                            {!! nl2br(e($event->description)) !!}
                        </div>
                    </div>
                    
                    <div class="mt-8 flex justify-between">
                        <a href="{{ route('home') }}" 
                           class="inline-flex items-center px-6 py-3 border-2 border-blue-500 rounded-full shadow-sm text-sm font-medium text-blue-500 bg-white hover:bg-blue-50 hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 space-x-2 transition duration-200">
                            <i class="fa-solid fa-arrow-left"></i>
                            <span>Back to Events</span>
                        </a>

                        @if(auth()->user()->role === 'admin')
                        <div>
                            <a href="{{ route('events.index') }}" class="bg-gray-500 hover:bg-gray-600 px-3 py-3 text-white text-sm rounded-md">Back to Dashboard</a>
                        </div>
                        @endif
                    </div>
                </article>
            </div>
            
            <div class="lg:col-span-4">
                <div class="bg-white rounded-2xl shadow-sm overflow-hidden sticky top-8">
                    <div class="bg-gradient-to-r from-blue-600 to-blue-700 text-white py-4 px-6">
                        <h5 class="font-semibold text-lg flex items-center gap-2">
                            <i class="fa-solid fa-circle-info"></i>
                            Event Details
                        </h5>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-4">
                            <li class="flex items-center space-x-3">
                                <i class="fa-regular fa-calendar-days text-blue-500 text-lg"></i>
                                <div>
                                    <span class="font-semibold text-gray-700">Date:</span> 
                                    <span class="text-gray-600">{{ $event->start_date->format('F d, Y') }}</span>
                                </div>
                            </li>
                            <li class="flex items-center space-x-3">
                                <i class="fa-regular fa-clock text-blue-500 text-lg"></i>
                                <div>
                                    <span class="font-semibold text-gray-700">Time:</span> 
                                    <span class="text-gray-600">{{ $event->start_date->format('h:i A') }}
                                    @if($event->end_date)
                                        - {{ $event->end_date->format('h:i A') }}
                                    @endif</span>
                                </div>
                            </li>
                            @if($event->location)
                            <li class="flex items-center space-x-3">
                                <i class="fa-solid fa-location-dot text-blue-500 text-lg"></i>
                                <div>
                                    <span class="font-semibold text-gray-700">Location:</span> 
                                    <span class="text-gray-600">{{ $event->location }}</span>
                                </div>
                            </li>
                            @endif
                        </ul>
                        
                        <hr class="my-6 border-gray-200">
                        
                        <div class="space-y-4">
                            <button onclick="window.print()" 
                                    class="w-full flex items-center justify-center px-6 py-3 border-2 border-blue-500 rounded-full shadow-sm text-sm font-semibold text-blue-500 bg-white hover:bg-blue-50 hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200">
                                <i class="fa-solid fa-print mr-2"></i>
                                Print Details
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-layout>