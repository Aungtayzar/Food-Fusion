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
            <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6">
                <div class="aspect-w-16 aspect-h-9">
                    @if(str_contains($resource->video_url, 'youtube'))
                        <iframe 
                            src="{{ str_replace('watch?v=', 'embed/', $resource->video_url) }}" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen 
                            class="w-full h-full">
                        </iframe>
                    @elseif(str_contains($resource->video_url, 'vimeo'))
                        <iframe 
                            src="{{ str_replace('vimeo.com/', 'player.vimeo.com/video/', $resource->video_url) }}" 
                            frameborder="0" 
                            allow="autoplay; fullscreen; picture-in-picture" 
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
                        
                        <div class="mt-4 sm:mt-0">
                            <button class="inline-flex items-center px-3 py-1 border border-gray-300 rounded-full text-sm text-gray-700 hover:bg-gray-100 transition-colors mr-2">
                                <i class="far fa-bookmark mr-1"></i> Save
                            </button>
                            <button class="inline-flex items-center px-3 py-1 border border-gray-300 rounded-full text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                                <i class="far fa-flag mr-1"></i> Report
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Video transcript -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6">
                <div class="p-4 bg-gray-50 border-b flex justify-between items-center">
                    <h2 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-file-alt mr-2 text-blue-500"></i> Transcript
                    </h2>
                    <button class="text-sm text-blue-600 hover:text-blue-800 font-medium">
                        <i class="fas fa-download mr-1"></i> Download transcript
                    </button>
                </div>
                <div class="p-6">
                    <div class="bg-gray-50 p-4 rounded-lg mb-4">
                        <p class="text-gray-700 text-sm italic">
                            This is an automatically generated transcript and may contain errors.
                        </p>
                    </div>
                    
                    <div class="space-y-4 max-h-80 overflow-y-auto pr-2">
                        <div class="flex">
                            <span class="text-gray-500 mr-3 whitespace-nowrap">00:00</span>
                            <p class="text-gray-700">Welcome to our educational video on renewable energy and its connections to sustainable food systems.</p>
                        </div>
                        
                        <div class="flex">
                            <span class="text-gray-500 mr-3 whitespace-nowrap">00:15</span>
                            <p class="text-gray-700">Today, we'll explore how renewable energy sources can revolutionize food production and processing while reducing environmental impact.</p>
                        </div>
                        
                        <div class="flex">
                            <span class="text-gray-500 mr-3 whitespace-nowrap">00:30</span>
                            <p class="text-gray-700">First, let's understand the current energy challenges in the food industry and why a shift to renewables is becoming essential.</p>
                        </div>
                        
                        <div class="flex">
                            <span class="text-gray-500 mr-3 whitespace-nowrap">01:05</span>
                            <p class="text-gray-700">The food system accounts for approximately 30% of global energy consumption, making it a significant contributor to greenhouse gas emissions.</p>
                        </div>
                        
                        <div class="flex">
                            <span class="text-gray-500 mr-3 whitespace-nowrap">01:35</span>
                            <p class="text-gray-700">By implementing solar, wind, and biomass energy solutions, food producers can substantially reduce their carbon footprint.</p>
                        </div>
                        
                        <div class="flex">
                            <span class="text-gray-500 mr-3 whitespace-nowrap">02:10</span>
                            <p class="text-gray-700">Let's look at some successful case studies where renewable energy has been integrated into various stages of the food production process.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Comments section -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-4 bg-gray-50 border-b">
                    <h2 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-comments mr-2 text-blue-500"></i> Comments (5)
                    </h2>
                </div>
                <div class="p-6">
                    <!-- Comment Form -->
                    <div class="mb-8">
                        <h3 class="text-base font-semibold text-gray-800 mb-4">Leave a Comment</h3>
                        <form>
                            <div class="mb-4">
                                <textarea 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    rows="3"
                                    placeholder="Add a comment..."></textarea>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-lg transition-colors">
                                    <i class="fas fa-paper-plane mr-2"></i> Post Comment
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Comments List -->
                    <div class="space-y-6">
                        <!-- Comment 1 -->
                        <div class="border-b border-gray-200 pb-6">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mr-3">
                                    <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center text-gray-600">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <div class="flex-grow">
                                    <div class="flex justify-between items-center mb-1">
                                        <h4 class="text-gray-800 font-medium">Robert Green</h4>
                                        <span class="text-sm text-gray-500">1 day ago</span>
                                    </div>
                                    <p class="text-gray-700 mb-2">Great video! I'm implementing solar panels in my restaurant and this provided some valuable insights on how to maximize the benefits.</p>
                                    <div class="flex items-center text-sm">
                                        <button class="flex items-center text-gray-500 hover:text-blue-600 mr-4">
                                            <i class="far fa-thumbs-up mr-1"></i> 12
                                        </button>
                                        <button class="flex items-center text-gray-500 hover:text-blue-600 mr-4">
                                            <i class="far fa-thumbs-down mr-1"></i> 1
                                        </button>
                                        <button class="text-blue-600 hover:text-blue-800 font-medium">
                                            <i class="fas fa-reply mr-1"></i> Reply
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Comment 2 with replies -->
                        <div class="border-b border-gray-200 pb-6">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mr-3">
                                    <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center text-gray-600">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <div class="flex-grow">
                                    <div class="flex justify-between items-center mb-1">
                                        <h4 class="text-gray-800 font-medium">Emma Wilson</h4>
                                        <span class="text-sm text-gray-500">3 days ago</span>
                                    </div>
                                    <p class="text-gray-700 mb-2">I'm curious about the cost analysis mentioned at 4:25. Are there any additional resources that go into more detail about ROI for small food businesses?</p>
                                    <div class="flex items-center text-sm mb-4">
                                        <button class="flex items-center text-gray-500 hover:text-blue-600 mr-4">
                                            <i class="far fa-thumbs-up mr-1"></i> 8
                                        </button>
                                        <button class="flex items-center text-gray-500 hover:text-blue-600 mr-4">
                                            <i class="far fa-thumbs-down mr-1"></i> 0
                                        </button>
                                        <button class="text-blue-600 hover:text-blue-800 font-medium">
                                            <i class="fas fa-reply mr-1"></i> Reply
                                        </button>
                                    </div>
                                    
                                    <!-- Reply -->
                                    <div class="ml-8 mt-4 bg-gray-50 p-4 rounded-lg">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 mr-3">
                                                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                                    <i class="fas fa-user-edit"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow">
                                                <div class="flex justify-between items-center mb-1">
                                                    <h4 class="text-gray-800 font-medium flex items-center">
                                                        <span>Admin</span>
                                                        <span class="ml-2 px-2 py-0.5 bg-blue-100 text-blue-800 rounded-full text-xs">Author</span>
                                                    </h4>
                                                    <span class="text-sm text-gray-500">2 days ago</span>
                                                </div>
                                                <p class="text-gray-700 mb-2">Hi Emma! Check out our "Renewable Energy ROI Calculator" in the related resources section. We also have a detailed PDF guide specifically for small food businesses.</p>
                                                <div class="flex items-center text-sm">
                                                    <button class="flex items-center text-gray-500 hover:text-blue-600 mr-4">
                                                        <i class="far fa-thumbs-up mr-1"></i> 4
                                                    </button>
                                                    <button class="flex items-center text-gray-500 hover:text-blue-600">
                                                        <i class="far fa-thumbs-down mr-1"></i> 0
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Load more comments button -->
                        <div class="text-center">
                            <button class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                                <i class="fas fa-sync-alt mr-2"></i> Load More Comments
                            </button>
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
            
            <!-- Related resources -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6">
                <div class="p-4 bg-gray-50 border-b">
                    <h2 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-link mr-2 text-blue-500"></i> Related Resources
                    </h2>
                </div>
                <div class="p-4">
                    <div class="space-y-4">
                        <a href="#" class="flex items-center p-3 hover:bg-blue-50 rounded-lg transition-colors">
                            <div class="mr-3 flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600">
                                <i class="fas fa-file-pdf"></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-800">Renewable Energy ROI Calculator</h3>
                                <p class="text-xs text-gray-500">PDF Guide • 15 pages</p>
                            </div>
                        </a>
                        
                        <a href="#" class="flex items-center p-3 hover:bg-green-50 rounded-lg transition-colors">
                            <div class="mr-3 flex-shrink-0 w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center text-green-600">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-800">Energy Sources Comparison</h3>
                                <p class="text-xs text-gray-500">Infographic • Interactive</p>
                            </div>
                        </a>
                        
                        <a href="#" class="flex items-center p-3 hover:bg-purple-50 rounded-lg transition-colors">
                            <div class="mr-3 flex-shrink-0 w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center text-purple-600">
                                <i class="fas fa-clipboard-list"></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-800">Solar Installation Checklist</h3>
                                <p class="text-xs text-gray-500">Worksheet • 3 pages</p>
                            </div>
                        </a>
                        
                        <a href="#" class="flex items-center p-3 hover:bg-yellow-50 rounded-lg transition-colors">
                            <div class="mr-3 flex-shrink-0 w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center text-yellow-600">
                                <i class="fas fa-calculator"></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-800">Energy Cost Savings Calculator</h3>
                                <p class="text-xs text-gray-500">Interactive Tool</p>
                            </div>
                        </a>
                        
                        <div class="pt-2 text-center">
                            <a href="{{ route('educational-resources.index') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium flex items-center justify-center">
                                <span>Browse All Resources</span>
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
                            <span class="text-gray-600">Duration:</span>
                            <span class="text-gray-800 font-medium">15:24</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Published:</span>
                            <span class="text-gray-800 font-medium">{{ $resource->created_at->format('M d, Y') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Category:</span>
                            <span class="text-gray-800 font-medium">Renewable Energy</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Views:</span>
                            <span class="text-gray-800 font-medium">{{ $resource->download_count }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Quality:</span>
                            <span class="text-gray-800 font-medium">HD (1080p)</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Language:</span>
                            <span class="text-gray-800 font-medium">English</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Newsletter signup -->
            <div class="bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <div class="text-center mb-4">
                        <div class="inline-flex items-center justify-center w-12 h-12 bg-white bg-opacity-20 rounded-full mb-3">
                            <i class="fas fa-envelope text-white text-xl"></i>
                        </div>
                        <h3 class="text-white text-lg font-bold">Stay Updated</h3>
                        <p class="text-blue-100 text-sm">Get notified about new educational resources</p>
                    </div>
                    
                    <form class="mt-4">
                        <div class="mb-3">
                            <input type="email" placeholder="Your email address" class="w-full px-4 py-2 rounded-lg border-0 focus:ring-2 focus:ring-blue-300">
                        </div>
                        <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-medium py-2 rounded-lg transition-colors">
                            Subscribe Now
                        </button>
                    </form>
                    
                    <p class="text-xs text-center text-blue-100 mt-3">
                        No spam. Unsubscribe anytime.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</x-layout>