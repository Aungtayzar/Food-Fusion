<x-layout>
<div class="container mx-auto py-8 px-4">
    <!-- Back button and breadcrumbs -->
    <div class="flex flex-wrap items-center mb-6">
        <a href="{{ route('educational-resources.index') }}" class="flex items-center text-blue-600 hover:text-blue-800 transition-colors">
            <i class="fas fa-arrow-left mr-2"></i> Back to Resources
        </a>
        <div class="mx-3 text-gray-400">/</div>
        <div class="text-gray-600">{{ $resource->title }}</div>
    </div>

    <!-- Main content container -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Video player section - larger column -->
        <div class="lg:col-span-2">
            <!-- Video player -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6 h-full">
                <div class="aspect-w-16 aspect-h-9 h-full">
                    @if(str_contains($resource->video_url, 'youtube.com') || str_contains($resource->video_url, 'youtu.be'))
                        @php
                            $videoId = '';
                            if (str_contains($resource->video_url, 'youtube.com')) {
                                if (str_contains($resource->video_url, 'watch?v=')) {
                                    $videoId = substr($resource->video_url, strpos($resource->video_url, 'watch?v=') + 8);
                                } elseif (str_contains($resource->video_url, 'embed/')) {
                                    $videoId = substr($resource->video_url, strpos($resource->video_url, 'embed/') + 6);
                                }
                            } elseif (str_contains($resource->video_url, 'youtu.be')) {
                                $videoId = substr($resource->video_url, strpos($resource->video_url, 'youtu.be/') + 9);
                            }
                            // Remove any additional parameters
                            if (str_contains($videoId, '&')) {
                                $videoId = substr($videoId, 0, strpos($videoId, '&'));
                            }
                        @endphp
                        <iframe 
                            src="https://www.youtube.com/embed/{{ $videoId }}" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen 
                            class="w-full h-full">
                        </iframe>
                    @else
                        <div class="w-full h-full bg-black flex items-center justify-center">
                            <video 
                                controls 
                                class="w-full h-full" 
                                poster="{{ asset('storage/' . $resource->thumbnail) }}">
                                <source src="{{ $resource->video_url }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Video information -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6">
                <div class="p-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">{{ $resource->title }}</h1>
                    
                    <div class="flex flex-wrap items-center text-sm text-gray-600 mb-4 pb-4 border-b">
                        <div class="mr-6 flex items-center">
                            <i class="fas fa-calendar-alt mr-2"></i> 
                            <span>{{ $resource->created_at->format('M d, Y') }}</span>
                        </div>
                        <div class="mr-6 flex items-center">
                            <i class="fas fa-eye mr-2"></i> 
                            <span>{{ $resource->download_count }} Views</span>
                        </div>
                        @if($resource->featured)
                        <div class="flex items-center text-yellow-500">
                            <i class="fas fa-star mr-2"></i> 
                            <span>Featured</span>
                        </div>
                        @endif
                    </div>
                    
                    <p class="text-gray-700 mb-6">{{ $resource->description }}</p>
                    
                    <!-- Video tags -->
                    <div class="mb-6">
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">
                                <i class="fas fa-tag mr-1"></i> Renewable Energy
                            </span>
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                                <i class="fas fa-leaf mr-1"></i> Sustainability
                            </span>
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">
                                <i class="fas fa-utensils mr-1"></i> Food Systems
                            </span>
                            <span class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-sm">
                                <i class="fas fa-seedling mr-1"></i> Eco-friendly
                            </span>
                        </div>
                    </div>
                    
                    <!-- Social sharing -->
                    <div class="flex flex-wrap items-center justify-between pt-4 border-t">
                        <div class="flex items-center">
                            <span class="mr-3 text-gray-700">Share:</span>
                            <a href="#" class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center mr-2 hover:bg-blue-700 transition-colors">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="w-8 h-8 rounded-full bg-blue-400 text-white flex items-center justify-center mr-2 hover:bg-blue-500 transition-colors">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="w-8 h-8 rounded-full bg-red-600 text-white flex items-center justify-center mr-2 hover:bg-red-700 transition-colors">
                                <i class="fab fa-youtube"></i>
                            </a>
                            <a href="#" class="w-8 h-8 rounded-full bg-green-600 text-white flex items-center justify-center mr-2 hover:bg-green-700 transition-colors">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Sidebar content - smaller column -->
        <div class="lg:col-span-1">
            <!-- Up next videos -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6">
                <div class="p-4 bg-gray-50 border-b">
                    <h2 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-play-circle mr-2 text-red-500"></i> Up Next
                    </h2>
                </div>
                <div class="p-4">
                    <div class="space-y-4">
                        @foreach($relatedVideos ?? [] as $video)
                        <a href="{{ route('educational-resources.watch', $video->id) }}" class="flex hover:bg-gray-50 p-2 rounded-lg transition-colors">
                            <div class="flex-shrink-0 relative w-24 h-16 mr-3">
                                <img src="{{ asset('storage/' . $video->thumbnail) }}" alt="{{ $video->title }}" class="w-full h-full object-cover rounded">
                                <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-30 rounded">
                                    <i class="fas fa-play text-white"></i>
                                </div>
                            </div>
                            <div class="flex-grow">
                                <h3 class="text-sm font-medium text-gray-800 line-clamp-2">{{ $video->title }}</h3>
                                <p class="text-xs text-gray-500 mt-1">{{ $video->download_count }} views</p>
                            </div>
                        </a>
                        @endforeach
                        
                        <!-- Fallback if no related videos -->
                        @if(!isset($relatedVideos) || count($relatedVideos) === 0)
                        <a href="#" class="flex hover:bg-gray-50 p-2 rounded-lg transition-colors">
                            <div class="flex-shrink-0 relative w-24 h-16 mr-3">
                                <div class="w-full h-full bg-gray-200 rounded flex items-center justify-center">
                                    <i class="fas fa-image text-gray-400"></i>
                                </div>
                                <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-30 rounded">
                                    <i class="fas fa-play text-white"></i>
                                </div>
                            </div>
                            <div class="flex-grow">
                                <h3 class="text-sm font-medium text-gray-800 line-clamp-2">Solar Power in Restaurant Kitchens</h3>
                                <p class="text-xs text-gray-500 mt-1">1.2K views</p>
                            </div>
                        </a>
                        
                        <a href="#" class="flex hover:bg-gray-50 p-2 rounded-lg transition-colors">
                            <div class="flex-shrink-0 relative w-24 h-16 mr-3">
                                <div class="w-full h-full bg-gray-200 rounded flex items-center justify-center">
                                    <i class="fas fa-image text-gray-400"></i>
                                </div>
                                <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-30 rounded">
                                    <i class="fas fa-play text-white"></i>
                                </div>
                            </div>
                            <div class="flex-grow">
                                <h3 class="text-sm font-medium text-gray-800 line-clamp-2">Wind Energy for Food Storage Solutions</h3>
                                <p class="text-xs text-gray-500 mt-1">876 views</p>
                            </div>
                        </a>
                        
                        <a href="#" class="flex hover:bg-gray-50 p-2 rounded-lg transition-colors">
                            <div class="flex-shrink-0 relative w-24 h-16 mr-3">
                                <div class="w-full h-full bg-gray-200 rounded flex items-center justify-center">
                                    <i class="fas fa-image text-gray-400"></i>
                                </div>
                                <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-30 rounded">
                                    <i class="fas fa-play text-white"></i>
                                </div>
                            </div>
                            <div class="flex-grow">
                                <h3 class="text-sm font-medium text-gray-800 line-clamp-2">Hydropower in Sustainable Agriculture</h3>
                                <p class="text-xs text-gray-500 mt-1">543 views</p>
                            </div>
                        </a>
                        @endif
                        
                        <div class="pt-2 text-center">
                            <a href="{{ route('educational-resources.index') }}?type=video" class="text-sm text-blue-600 hover:text-blue-800 font-medium flex items-center justify-center">
                                <span>View All Videos</span>
                                <i class="fas fa-arrow-right ml-1 text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Resource details -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6">
                <div class="p-4 bg-gray-50 border-b">
                    <h2 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-info-circle mr-2 text-blue-500"></i> Resource Details
                    </h2>
                </div>
                <div class="p-4">
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Published:</span>
                            <span class="text-gray-800 font-medium">{{ $resource->created_at->format('M d, Y') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Views:</span>
                            <span class="text-gray-800 font-medium">{{ $resource->download_count }}</span>
                        </div>  
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
</x-layout>