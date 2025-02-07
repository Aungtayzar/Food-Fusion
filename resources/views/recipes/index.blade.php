<x-layout>
    
        <!-- Filters -->
        <div class="container mx-auto my-6 flex justify-between items-center">
            <div class="space-x-4">
                <button class="bg-gray-200 px-4 py-2 rounded">All Recipes</button>
                <button class="bg-gray-200 px-4 py-2 rounded">Asian Fusion</button>
                <button class="bg-gray-200 px-4 py-2 rounded">Mexican Fusion</button>
                <button class="bg-gray-200 px-4 py-2 rounded">More Filters</button>
            </div>
            <div>
                <select class="px-4 py-2 rounded bg-gray-200">
                    <option>Sort by Newest</option>
                    <option>Most Popular</option>
                    <option>Highest Rated</option>
                </select>
            </div>
        </div>
    
        <!-- Recipes Grid -->
        <div class="container mx-auto grid grid-cols-3 gap-6 px-4">
            <!-- Recipe Card 1 -->
            @forelse($recipes as $recipe)
            <x-recipe-card :recipe='$recipe'/>
            @empty
            <li>No recipes found</li>
            @endforelse
    
        </div>
    
        <!-- Pagination -->
        <div class="container mx-auto flex justify-center my-8 space-x-2">
            <button class="px-4 py-2 bg-gray-200 rounded">1</button>
            <button class="px-4 py-2 bg-gray-200 rounded">2</button>
            <button class="px-4 py-2 bg-gray-200 rounded">3</button>
            <button class="px-4 py-2 bg-orange-500 text-white rounded">Next</button>
        </div>
</x-layout>