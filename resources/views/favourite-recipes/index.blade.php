<x-layout>
    <x-left-side-bar>
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-8">My Favorite Recipes</h1>
            
            @if($favouriteRecipes->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($favouriteRecipes as $recipe)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                            <div class="relative">
                                <img src="/storage/{{$recipe->image}}" alt="{{ $recipe->title }}" class="w-full h-48 object-cover">
                                <div class="absolute top-0 right-0 p-2">
                                    <form action="{{ route('recipes.favorite.toggle', $recipe) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            <i class="fa-solid fa-heart"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="p-4">
                                <a href="{{ route('recipes.show', $recipe) }}" class="block">
                                    <h2 class="text-xl font-semibold text-gray-800 mb-2 hover:text-blue-600">{{ $recipe->title }}</h2>
                                </a>
                                <p class="text-gray-600 text-sm mb-4">{{ Str::limit($recipe->description, 100) }}</p>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <div class="text-sm text-gray-500 flex items-center space-x-2">
                                            <i class="fa-regular fa-clock"></i>
                                            <span>{{ $recipe->cooking_time }} mins</span>
                                        </div>
                                        <div class="text-sm text-gray-500 flex items-center space-x-2">
                                            <i class="fa-regular fa-user"></i>
                                            <span>{{ $recipe->user->name }}</span>
                                        </div>
                                    </div>
                                    <a href="{{ route('recipes.show', $recipe) }}" class="flex justify-center items-center text-blue-600 hover:text-blue-800 text-sm font-medium space-x-2">
                                        <span>View Recipe</span>
                                        <i class="fa-solid fa-arrow-right-long"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4">
                    {{ $favouriteRecipes->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <div class="text-gray-500 mb-4">
                        <svg class="mx-auto h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No Favorite Recipes Yet</h3>
                    <p class="text-gray-500">Start exploring recipes and add them to your favorites!</p>
                    <a href="{{ route('recipes.index') }}" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                        Explore Recipes
                    </a>
                </div>
            @endif
        </div>
    </x-left-side-bar>
</x-layout>