<x-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="grid md:grid-cols-2 gap-8 bg-gray-300 rounded-lg shadow-lg">
            <!-- Recipe Image -->
            <div>
                <img src="/storage/{{ $recipe->image }}" alt="{{ $recipe->title }}" class="w-full h-96 object-cover rounded-lg shadow-md">
            </div>
    
            <!-- Recipe Details -->
            <div class="py-4">
                <h1 class="text-3xl font-bold mb-4">{{ $recipe->title }}</h1>
                
                <div class="flex items-center space-x-4 mb-4">
                    <div class="flex items-center">
                        <i class="fas fa-clock text-gray-600 mr-2"></i>
                        <span>Prep: {{ $recipe->preparation_time }} min</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-utensils text-gray-600 mr-2"></i>
                        <span>Cook: {{ $recipe->cooking_time }} min</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-chart-bar text-gray-600 mr-2"></i>
                        <span>{{ $recipe->difficulty_level }}</span>
                    </div>
                </div>
    
                <div class="mb-6">
                    <h2 class="text-xl font-semibold mb-2">Description</h2>
                    <p class="text-gray-700">{{ $recipe->description }}</p>
                </div>
    
                <!-- Update and Delete Buttons -->
                <div class="flex space-x-4">
                    <!-- Update Button -->
                    <a href="{{ route('recipes.edit', $recipe->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">
                        Edit Recipe
                    </a>
    
                    <!-- Delete Button -->
                    <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this recipe?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition duration-300">
                            Delete Recipe
                        </button>
                    </form>
                </div>
            </div>
        </div>
    
        <div class="mt-8">
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Ingredients -->
                <div class="bg-gray-300 p-4 rounded-lg shadow-xl">
                    <h2 class="text-2xl font-semibold mb-4">Ingredients</h2>
                    <p class="text-gray-900">{{ $recipe->ingredients }}</p>
                </div>
    
                <!-- Instructions -->
                <div class="bg-gray-300 p-4 rounded-lg shadow-xl">
                    <h2 class="text-2xl font-semibold mb-4">Instructions</h2>
                    <ol class="space-y-4">
                        <p class="text-gray-900">{{ $recipe->instructions }}</p>
                    </ol>
                </div>
            </div>
        </div>
    
        <div class="mt-8 text-center">
            <span class="text-gray-500">Recipe by {{ $recipe->user->name }} | Cuisine: {{ $recipe->cuisine->name }}</span>
        </div>
    </div>
</x-layout>