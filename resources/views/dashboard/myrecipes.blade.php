<x-layout>
<x-left-side-bar>
    <div class="p-6 bg-white">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">My Recipes</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @if (auth()->user()->role == 'admin')
            @foreach ($adminrecipes as $adminrecipe)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset('storage/' . $adminrecipe->image) }}" alt="{{ $adminrecipe->name }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <a href="{{ route('recipes.show', $adminrecipe) }}" class="block">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2 hover:text-blue-600">{{ $adminrecipe->title }}</h2>
                    </a>
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($adminrecipe->description, 100) }}</p>
                    
                    <div class="flex justify-between space-x-2">
                        <div class="flex items-center space-x-4">
                            <div class="text-sm text-gray-500 flex justify-center items-center space-x-2">
                                <i class="fa-regular fa-clock"></i>
                                <span>{{ $adminrecipe->cooking_time }} mins</span>
                            </div>
                        </div>
                        @can('update',$adminrecipe)                         
                        <div>
                            <a href="{{ route('recipes.edit', $adminrecipe->id) }}" 
                                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                                 Edit
                             </a>
                             <form action="{{ route('recipes.destroy', $adminrecipe->id) }}" method="POST" class="inline">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" 
                                         class="px-2 py-2 mx-2 bg-red-500 text-white rounded hover:bg-red-600 transition"
                                         onclick="return confirm('Are you sure you want to delete this recipe?')">
                                     Delete
                                 </button>
                             </form>
                        </div>
                        @endcan
                    </div>
                </div>
            </div>
            
        @endforeach
        </div>
        
        <!-- Moved pagination outside the grid and improved centering -->
        <div class="mt-6 flex justify-center w-full">
            {{$adminrecipes->links()}}
        </div>
            @else
            @foreach ($recipes as $recipe)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->name }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <a href="{{ route('recipes.show', $recipe) }}" class="block">
                            <h2 class="text-xl font-semibold text-gray-800 mb-2 hover:text-blue-600">{{ $recipe->title }}</h2>
                        </a>
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($recipe->description, 100) }}</p>
                        
                        <div class="flex justify-between space-x-2">
                            <div class="flex items-center space-x-4">
                                <span class="text-sm text-gray-500 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $recipe->cooking_time }} mins
                                </span>
                            </div>
                            @can('update',$recipe)                         
                            <div>
                                <a href="{{ route('recipes.edit', $recipe->id) }}" 
                                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                                     Edit
                                 </a>
                                 <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" class="inline">
                                     @csrf
                                     @method('DELETE')
                                     <button type="submit" 
                                             class="px-2 py-2 mx-2 bg-red-500 text-white rounded hover:bg-red-600 transition"
                                             onclick="return confirm('Are you sure you want to delete this recipe?')">
                                         Delete
                                     </button>
                                 </form>
                            </div>
                            @endcan
                        </div>
                    </div>
                </div>
            @endforeach
            @endif
        </div>

        @if(auth()->user()->role == 'admin')
            @if($adminrecipes->total() == 0)
                <div class="text-center py-8">
                    <p class="text-gray-500">No recipes found. Start creating your first recipe!</p>
                </div>
            @endif
        @else
            @if($recipes->total() == 0)
                <div class="text-center py-8">
                    <p class="text-gray-500">No recipes found. Start creating your first recipe!</p>
                </div>
            @endif
        @endif
        
       
    </div>
</x-left-side-bar>
</x-layout>