<x-layout>
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Culinary Resources</h1>
        @auth
        <div class="flex items-center space-x-4">
            <form action="{{ route('culinary-resources.index') }}" method="GET" class="inline-flex items-center space-x-4">
                <x-select-filter 
                    name="resource_type" 
                    :options="$resourceTypes" 
                    all="All Types" 
                />
                <x-select-filter 
                    name="sort" 
                    :options="['latest' => 'Sort by Newest', 'oldest' => 'Sort by Oldest']" 
                    all="Sort by"
                />
            </form>
            @if (auth()->user()->role === 'admin')
            <a href="{{ route('culinary-resources.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Upload Resource
            </a>
            @endif
        </div>
        @endauth
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($resources as $resource)
            <div class="rounded-lg shadow-md overflow-hidden transform transition duration-300 ease-in-out hover:scale-105 hover:shadow-xl
                @if($resource->type === 'recipe_card') 
                    bg-green-50 hover:bg-green-100
                @elseif($resource->type === 'tutorial')
                    bg-blue-50 hover:bg-blue-100
                @else
                    bg-purple-50 hover:bg-purple-100
                @endif">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">{{ $resource->title }}</h3>
                    <p class="text-gray-600 mb-4">{{ $resource->description }}</p>
                    <div class="flex justify-between items-center">
                        <span class="px-3 py-1 rounded-full text-sm
                            @if($resource->type === 'recipe_card') 
                                bg-green-200 text-green-800
                            @elseif($resource->type === 'tutorial')
                                bg-blue-200 text-blue-800
                            @else
                                bg-purple-200 text-purple-800
                            @endif">
                            {{ ucfirst(str_replace('_', ' ', $resource->type)) }}
                        </span>
                        <a href="{{ route('culinary-resources.download', $resource) }}" 
                           class="text-blue-500 hover:text-blue-700 transition duration-300">
                            Download
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $resources->links() }}
    </div>
</div>
</x-layout>
