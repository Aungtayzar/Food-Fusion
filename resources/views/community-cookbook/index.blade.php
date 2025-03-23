<x-layout>
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Community Cookbook</h1>
    </div>

    @if($recipes->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($recipes as $recipe)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="relative h-48 overflow-hidden">
                        @if($recipe->image)
                            <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                <i class="fas fa-utensils text-4xl text-gray-400"></i>
                            </div>
                        @endif
                        <div class="absolute top-0 right-0 bg-gray-900 bg-opacity-50 text-white text-xs px-2 py-1 m-2 rounded">
                            <i class="fas fa-clock mr-1"></i>{{ $recipe->cooking_time }} mins
                        </div>
                    </div>
                    
                    <div class="p-5">
                        <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $recipe->title }}</h2>
                        
                        <p class="text-gray-600 mb-4 line-clamp-2">{{ $recipe->description }}</p>
                        
                        @if($recipe->cooking_tips)
                            <div class="mb-3">
                                <h3 class="text-sm font-semibold text-gray-700 flex items-center">
                                    <i class="fas fa-lightbulb text-yellow-500 mr-2"></i>Cooking Tip
                                </h3>
                                <p class="text-gray-600 text-sm italic line-clamp-2">{{ $recipe->cooking_tips }}</p>
                            </div>
                        @endif
                        
                        @if($recipe->personal_notes)
                            <div class="mb-4">
                                <h3 class="text-sm font-semibold text-gray-700 flex items-center">
                                    <i class="fas fa-sticky-note text-blue-500 mr-2"></i>Personal Notes
                                </h3>
                                <p class="text-gray-600 text-sm line-clamp-2">{{ $recipe->personal_notes }}</p>
                            </div>
                        @endif
                        
                        <div class="flex justify-between items-center pt-3 border-t border-gray-100">
                            <div class="flex items-center">
                                <i class="fas fa-user-circle text-gray-400 mr-1"></i>
                                <span class="text-sm text-gray-500">{{ $recipe->user->name }}</span>
                            </div>
                            <a href="{{ route('recipes.show', $recipe->id) }}" class="text-blue-500 hover:text-blue-700 font-medium text-sm">
                                Go to Community Dissusion <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="mt-8">
            {{ $recipes->links() }}
        </div>
    @else
        <div class="bg-gray-100 rounded-lg p-8 text-center">
            <i class="fas fa-book-open text-5xl text-gray-400 mb-4"></i>
            <h2 class="text-2xl font-bold text-gray-700 mb-2">No Recipes Found</h2>
            <p class="text-gray-600 mb-6">Be the first to contribute to our community cookbook!</p>
            <a href="{{ route('recipes.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                <i class="fas fa-plus mr-2"></i>Add Your Recipe
            </a>
        </div>
    @endif
</div>
</x-layout>