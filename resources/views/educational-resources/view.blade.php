<x-layout>
<div class="container mx-auto py-8 px-4">
    <!-- Back button and breadcrumbs -->
    <div class="flex flex-wrap items-center mb-6">
        <a href="{{ route('educational-resources.index') }}" class="flex items-center text-blue-600 hover:text-blue-800 transition-colors">
            <i class="fas fa-arrow-left mr-2"></i> Back to Resources
        </a>
        <div class="mx-5 text-gray-400">/</div>
        <div class="text-gray-600">{{ $resource->title }}</div>
    </div>

    <!-- Resource header -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-8">
        <div class="bg-gradient-to-r from-green-500 to-blue-500 px-6 py-4">
            <div class="flex flex-wrap items-center justify-between">
                <h1 class="text-white text-2xl md:text-3xl font-bold">{{ $resource->title }}</h1>
                <span class="mt-2 md:mt-0 px-4 py-1 bg-white bg-opacity-20 rounded-full text-white text-sm flex items-center">
                    <i class="fas fa-chart-pie mr-2"></i> Infographic
                </span>
            </div>
        </div>
        
        <div class="p-6">
            <div class="flex flex-wrap items-center text-sm text-gray-600 mb-4">
                <div class="mr-6 flex items-center">
                    <i class="fas fa-calendar mr-2"></i> 
                    <span>Published: {{ $resource->created_at->format('M d, Y') }}</span>
                </div>
                <div class="mr-6 flex items-center">
                    <i class="fas fa-download mr-2"></i> 
                    <span>{{ $resource->download_count }} Downloads</span>
                </div>
                @if($resource->featured)
                <div class="flex items-center text-yellow-500">
                    <i class="fas fa-star mr-2"></i> 
                    <span>Featured Resource</span>
                </div>
                @endif
            </div>
            
            <p class="text-gray-700 mb-6">{{ $resource->description }}</p>
            
            <!-- Social sharing -->
            <div class="flex flex-wrap items-center mb-6">
                <span class="mr-3 text-gray-700">Share:</span>
                <a href="#" class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center mr-2 hover:bg-blue-700 transition-colors">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center mr-2 hover:bg-blue-700 transition-colors">
                    <i class="fa-brands fa-twitter"></i>
                </a>
                <a href="#" class="w-8 h-8 rounded-full bg-green-600 text-white flex items-center justify-center mr-2 hover:bg-green-700 transition-colors">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="#" class="w-8 h-8 rounded-full bg-blue-500 text-white flex items-center justify-center mr-2 hover:bg-blue-700 transition-colors">
                    <i class="fa-brands fa-linkedin"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Infographic display -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-8">
        <div class="p-4 bg-gray-50 border-b">
            <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                <i class="fas fa-image mr-2 text-green-500"></i> Infographic Preview
            </h2>
        </div>
        <div class="p-6 flex justify-center">
            <div class="bg-white shadow rounded-lg overflow-hidden max-w-4xl">
                <img src="{{ asset('storage/' . $resource->image_path) }}" 
                     alt="{{ $resource->title }}" 
                     class="w-full h-auto"
                     loading="lazy">
            </div>
        </div>
    </div>

    <!-- Key takeaways -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-8">
        <div class="p-4 bg-gray-50 border-b">
            <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                <i class="fas fa-lightbulb mr-2 text-yellow-500"></i> Key Takeaways
            </h2>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-green-100 flex items-center justify-center mr-4">
                        <i class="fas fa-leaf text-green-500"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800">Sustainable Energy</h3>
                        <p class="text-gray-600">Learn how renewable energy sources can complement sustainable food practices.</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                        <i class="fas fa-tint text-blue-500"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800">Water Conservation</h3>
                        <p class="text-gray-600">Discover the connection between energy usage and water conservation in food production.</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-yellow-100 flex items-center justify-center mr-4">
                        <i class="fas fa-sun text-yellow-500"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800">Solar Energy</h3>
                        <p class="text-gray-600">Explore how solar energy can be used in modern agricultural practices.</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-red-100 flex items-center justify-center mr-4">
                        <i class="fas fa-fire-alt text-red-500"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800">Carbon Footprint</h3>
                        <p class="text-gray-600">Understanding the carbon footprint impact of energy choices in food systems.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related resources -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-8">
        <div class="p-4 bg-gray-50 border-b">
            <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                <i class="fas fa-link mr-2 text-blue-500"></i> Related Resources
            </h2>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedResources ?? [] as $related)
                <div class="border rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <img src="{{ asset('storage/' . $related->thumbnail) }}" alt="{{ $related->title }}" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full
                                {{ $related->type === 'document' ? 'text-blue-600 bg-blue-200' : 
                                   ($related->type === 'infographic' ? 'text-green-600 bg-green-200' : 
                                   'text-red-600 bg-red-200') }}">
                                {{ ucfirst($related->type) }}
                            </span>
                            <span class="text-xs text-gray-500">
                                <i class="fas fa-download mr-1"></i> {{ $related->download_count }}
                            </span>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-1">{{ $related->title }}</h3>
                        <p class="text-sm text-gray-600 mb-2">{{ \Illuminate\Support\Str::limit($related->description, 80) }}</p>
                        <a href="{{ route('educational-resources.' . ($related->type === 'document' ? 'download' : ($related->type === 'infographic' ? 'view' : 'watch')), $related->id) }}" 
                           class="text-sm text-blue-600 hover:text-blue-800 font-medium flex items-center">
                            @if($related->type === 'document')
                                <span>DownLoad</span>
                            @elseif ($related->type === 'infographic')
                                <span>View Infographic</span>
                            @elseif ($related->type === 'video')
                                <span>Watch Video</span>
                            @endif
                            <i class="fas fa-arrow-right ml-1 text-xs"></i>
                        </a>
                    </div>
                </div>
                @endforeach

                <!-- Fallback if no related resources -->
                @if(!isset($relatedResources) || count($relatedResources) === 0)
                <div class="border rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <div class="h-40 bg-gray-100 flex items-center justify-center">
                        <i class="fas fa-file-pdf text-gray-400 text-4xl"></i>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blue-600 bg-blue-200">
                                Document
                            </span>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-1">Renewable Energy Guide</h3>
                        <p class="text-sm text-gray-600 mb-2">Comprehensive guide to renewable energy sources and their applications.</p>
                        <a href="{{ route('educational-resources.index') }}" 
                           class="text-sm text-blue-600 hover:text-blue-800 font-medium flex items-center">
                            <span>Browse Resources</span>
                            <i class="fas fa-arrow-right ml-1 text-xs"></i>
                        </a>
                    </div>
                </div>

                <div class="border rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <div class="h-40 bg-gray-100 flex items-center justify-center">
                        <i class="fas fa-video text-gray-400 text-4xl"></i>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-red-600 bg-red-200">
                                Video
                            </span>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-1">Solar Energy and Food Production</h3>
                        <p class="text-sm text-gray-600 mb-2">Learn how solar energy is transforming modern agricultural practices.</p>
                        <a href="{{ route('educational-resources.index') }}" 
                           class="text-sm text-blue-600 hover:text-blue-800 font-medium flex items-center">
                            <span>Browse Resources</span>
                            <i class="fas fa-arrow-right ml-1 text-xs"></i>
                        </a>
                    </div>
                </div>

                <div class="border rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <div class="h-40 bg-gray-100 flex items-center justify-center">
                        <i class="fas fa-chart-pie text-gray-400 text-4xl"></i>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-green-600 bg-green-200">
                                Infographic
                            </span>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-1">Energy Efficiency in Cooking</h3>
                        <p class="text-sm text-gray-600 mb-2">Visual guide to reducing energy consumption while preparing meals.</p>
                        <a href="{{ route('educational-resources.index') }}" 
                           class="text-sm text-blue-600 hover:text-blue-800 font-medium flex items-center">
                            <span>Browse Resources</span>
                            <i class="fas fa-arrow-right ml-1 text-xs"></i>
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>