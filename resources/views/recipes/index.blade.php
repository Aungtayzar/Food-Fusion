<x-layout>
    <!-- Filters -->
    <div class="container mx-auto my-6 px-4">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center space-y-4 md:space-y-0">
            <div class="w-full md:w-auto">
                <form action="{{ route('recipes.index') }}" method="GET" class="flex flex-col sm:flex-row items-start sm:items-center space-y-3 sm:space-y-0 sm:space-x-4">
                    <x-select-filter 
                        name="cuisine" 
                        :options="$cuisines" 
                        all="All Cuisines" 
                        class="w-full sm:w-auto mb-2 sm:mb-0"
                    />

                    <x-select-filter 
                        name="dietary_preference" 
                        :options="$dietaryPreferences" 
                        all="All Dietary Preferences" 
                        class="w-full sm:w-auto mb-2 sm:mb-0"
                    />
                    <x-select-filter 
                        name="sort" 
                        :options="['latest' => 'Sort by Newest', 'oldest' => 'Sort by Oldest']" 
                        all="Sort by"
                        class="w-full sm:w-auto"
                    />
                </form>
            </div>
            <div class="w-full md:w-auto flex justify-start md:justify-end">
                <x-button-link url="/recipes/create" bgColor="orange-500" textColor="text-white" icon="edit">Create Recipe</x-button-link>
            </div>
        </div>
    </div>

    @if(request()->has('search'))
        <div class="container mx-auto px-4">
            <a
            href="{{ route('recipes.index') }}"
            class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded mb-4 inline-block"
            >
            <i class="fa fa-arrow-left mr-1"></i> Back
            </a>
        </div>
    @endif

    <!-- Recipes Grid -->
    <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 px-4 mb-3">
        <!-- Recipe Cards -->
        @forelse($recipes as $recipe)
            <x-recipe-card :recipe='$recipe'/>
        @empty
            <div class="col-span-full text-center py-8">
                <p class="text-gray-500 text-lg">No recipes found</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="container mx-auto px-4 mb-6">
        {{$recipes->links()}}
    </div>
</x-layout>