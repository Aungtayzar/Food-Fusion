<!-- resources/views/educational-resources/index.blade.php -->
<x-layout>
<div class="container mx-auto py-12 px-4">
    <div class="flex flex-col md:flex-row mb-12 gap-6">
        <div class="md:w-2/3">
            <h1 class="text-4xl font-bold mb-3">Educational Resources</h1>
            <p class="text-xl text-gray-600">Explore our collection of downloadable resources, infographics, and videos on renewable energy topics.</p>
        </div>
        <div class="md:w-1/3">
            <div class="bg-gray-100 rounded-lg p-4">
                <h5 class="font-bold text-lg"><i class="fas fa-lightbulb text-yellow-500"></i> Did You Know?</h5>
                <p>Renewable energy sources can help reduce your carbon footprint while complementing sustainable food practices.</p>
            </div>
        </div>
    </div>

    <!-- Featured Resources -->
    <div class="mb-12">
        <div class="mb-4">
            <h2 class="text-2xl font-bold"><i class="fas fa-star text-yellow-500"></i> Featured Resources</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($featuredResources as $resource)
            <div class="relative bg-white rounded-lg shadow-md hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                @if($resource->featured)
                <span class="absolute top-2 left-2 bg-yellow-400 text-black text-xs px-3 py-1 rounded-full">
                    <i class="fas fa-star"></i> Featured
                </span>
                @endif
                <span class="absolute top-2 right-2 text-xs px-3 py-1 rounded-full
                    {{ $resource->type == 'document' ? 'bg-blue-100 text-blue-800' : '' }}
                    {{ $resource->type == 'infographic' ? 'bg-green-100 text-green-800' : '' }}
                    {{ $resource->type == 'video' ? 'bg-red-100 text-red-800' : '' }}">
                    @if($resource->type == 'document')
                        <i class="fas fa-file-alt"></i> Document
                    @elseif($resource->type == 'infographic')
                        <i class="fas fa-chart-pie"></i> Infographic
                    @else
                        <i class="fas fa-video"></i> Video
                    @endif
                </span>
                <img src="{{ asset('storage/' . $resource->thumbnail) }}" class="w-full h-48 object-cover rounded-t-lg" alt="{{ $resource->title }}">
                <div class="p-4">
                    <h5 class="text-lg font-bold mb-2">{{ $resource->title }}</h5>
                    <p class="text-gray-700 mb-6">{{ Str::limit($resource->description, 100) }}</p>
                </div>
                <div class="px-4 py-3 bg-white border-t flex justify-between items-center">
                    <span class="text-gray-500">
                        <i class="fas fa-download"></i> {{ $resource->download_count }} downloads
                    </span>
                    @if($resource->type == 'document')
                        <a href="{{ route('educational-resources.download',$resource->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition-colors">
                            <i class="fas fa-download"></i> Download
                        </a>
                    @elseif($resource->type == 'infographic')
                        <a href="{{ route('educational-resources.view',$resource->id) }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md transition-colors">
                            <i class="fas fa-eye"></i> View
                        </a>
                    @else
                        <a href="{{ route('educational-resources.watch',$resource->id) }}" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md transition-colors">
                            <i class="fas fa-play"></i> Watch
                        </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Filter options -->
    <div class="mb-8">
        <div class="bg-white rounded-lg shadow">
            <div class="p-4">
                <h5 class="font-bold mb-3">Filter Resources</h5>
                <div class="flex flex-wrap">
                    <button class="filter-btn active bg-blue-600 text-white hover:bg-blue-700 mr-2 mb-2 px-4 py-2 rounded-md transition-colors" data-filter="all">
                        <i class="fas fa-th-large"></i> All Resources
                    </button>
                    <button class="filter-btn bg-white border border-blue-600 text-blue-600 hover:bg-blue-50 mr-2 mb-2 px-4 py-2 rounded-md transition-colors" data-filter="document">
                        <i class="fas fa-file-pdf"></i> Documents
                    </button>
                    <button class="filter-btn bg-white border border-blue-600 text-blue-600 hover:bg-blue-50 mr-2 mb-2 px-4 py-2 rounded-md transition-colors" data-filter="infographic">
                        <i class="fas fa-chart-pie"></i> Infographics
                    </button>
                    <button class="filter-btn bg-white border border-blue-600 text-blue-600 hover:bg-blue-50 mr-2 mb-2 px-4 py-2 rounded-md transition-colors" data-filter="video">
                        <i class="fas fa-video"></i> Videos
                    </button>
                    <button class="filter-btn bg-white border border-yellow-500 text-yellow-600 hover:bg-yellow-50 mr-2 mb-2 px-4 py-2 rounded-md transition-colors" data-filter="featured">
                        <i class="fas fa-star"></i> Featured
                    </button>
                </div>
            </div>
        </div>
    </div>

    

    <!-- All Resources -->
    <div class="mb-4">
        <h2 class="text-2xl font-bold mb-4"><i class="fas fa-th-large"></i> All Resources</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" id="resources-container">
        @foreach($resources as $resource)
        <div class="resource-item h-full" data-type="{{ $resource->type }}" data-featured="{{ $resource->featured ? 'featured' : '' }}">
            <div class="relative bg-white rounded-lg shadow-md hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 h-full flex flex-col">
                @if($resource->featured)
                <span class="absolute top-2 left-2 bg-yellow-400 text-black text-xs px-3 py-1 rounded-full">
                    <i class="fas fa-star"></i> Featured
                </span>
                @endif
                <span class="absolute top-2 right-2 text-xs px-3 py-1 rounded-full
                    {{ $resource->type == 'document' ? 'bg-blue-100 text-blue-800' : '' }}
                    {{ $resource->type == 'infographic' ? 'bg-green-100 text-green-800' : '' }}
                    {{ $resource->type == 'video' ? 'bg-red-100 text-red-800' : '' }}">
                    @if($resource->type == 'document')
                        <i class="fas fa-file-alt"></i> Document
                    @elseif($resource->type == 'infographic')
                        <i class="fas fa-chart-pie"></i> Infographic
                    @else
                        <i class="fas fa-video"></i> Video
                    @endif
                </span>
                <img src="{{ asset('storage/' . $resource->thumbnail) }}" class="w-full h-36 object-cover rounded-t-lg" alt="{{ $resource->title }}">
                <div class="p-4 flex-grow">
                    <h5 class="font-bold mb-2">{{ $resource->title }}</h5>
                    <p class="text-gray-700 text-sm mb-3">{{ Str::limit($resource->description, 80) }}</p>
                    @if($resource->type == 'document')
                        <p class="text-gray-500 text-xs mb-0">
                            <i class="fas fa-file"></i> {{ $resource->file_format }} | {{ $resource->file_size }}
                        </p>
                    @endif
                </div>
                <div class="px-4 py-3 bg-white border-t rounded-b-lg flex justify-between items-center">
                    <span class="text-gray-500 text-xs">
                        <i class="fas fa-download"></i> {{ $resource->download_count }}
                    </span>
                    @if($resource->type == 'document')
                        <a href="{{ route('educational-resources.download',$resource->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white text-xs px-3 py-1 rounded-md transition-colors">
                            <i class="fas fa-download"></i> Download
                        </a>
                    @elseif($resource->type == 'infographic')
                        <a href="{{ route('educational-resources.view',$resource->id) }}" class="bg-green-600 hover:bg-green-700 text-white text-xs px-3 py-1 rounded-md transition-colors">
                            <i class="fas fa-eye"></i> View
                        </a>
                    @else
                        <a href="{{ route('educational-resources.watch',$resource->id) }}" class="bg-red-600 hover:bg-red-700 text-white text-xs px-3 py-1 rounded-md transition-colors">
                            <i class="fas fa-play"></i> Watch
                        </a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-8 flex justify-center">
        {{ $resources->links() }}
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Resource filtering
        const filterButtons = document.querySelectorAll('.filter-btn');
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Update active state for buttons
                filterButtons.forEach(btn => {
                    btn.classList.remove('active', 'bg-blue-600', 'text-white');
                    btn.classList.add('bg-white', 'border', 'border-blue-600', 'text-blue-600');
                    
                    // Special case for featured button
                    if (btn.dataset.filter === 'featured') {
                        btn.classList.remove('border-blue-600', 'text-blue-600');
                        btn.classList.add('border-yellow-500', 'text-yellow-600');
                    }
                });
                
                this.classList.add('active', 'bg-blue-600', 'text-white');
                this.classList.remove('bg-white', 'border', 'border-blue-600', 'text-blue-600', 'border-yellow-500', 'text-yellow-600');
                
                const filterValue = this.dataset.filter;
                const resourceItems = document.querySelectorAll('.resource-item');
                
                if (filterValue === 'all') {
                    resourceItems.forEach(item => {
                        item.style.display = 'block';
                    });
                } else if (filterValue === 'featured') {
                    resourceItems.forEach(item => {
                        if (item.dataset.featured === 'featured') {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                } else {
                    resourceItems.forEach(item => {
                        if (item.dataset.type === filterValue) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                }
            });
        });
    });
</script>
</x-layout>