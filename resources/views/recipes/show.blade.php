<x-layout>
    <div class="max-w-6xl mx-auto mt-8 px-4">
        <!-- Back Button -->
        <a href="{{ route('recipes.index') }}" class="inline-flex items-center mb-6 text-indigo-600 hover:text-indigo-800 transition-colors duration-200">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Recipes
        </a>
    
        <div class="bg-white rounded-xl shadow-2xl overflow-hidden">
            <!-- Recipe Header -->
            <div class="relative">
                @if($recipe->image)
                    <img class="w-full h-96 object-cover" src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}">
                @endif
                <div class="absolute top-4 right-4 flex gap-2">
                    @auth
                        <form action="{{ route('recipes.favorite.toggle', $recipe) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-white p-3 rounded-full shadow-lg hover:bg-gray-100 transform hover:scale-105 transition-all duration-200">
                                <i class="fas fa-heart text-xl {{ $recipe->isFavoritedByUser(auth()->id()) ? 'text-red-500' : 'text-gray-400' }}"></i>
                            </button>
                        </form>
                    @endauth
                </div>
            </div>
    
            <!-- Recipe Content -->
            <div class="p-8 mt-5">
                <div class="flex items-center justify-between mb-6">
                    <h1 class="text-4xl font-bold text-gray-800">{{ $recipe->title }}</h1>
                    <div class="text-gray-600 me-2">
                        <i class="fas fa-user-circle mr-2"></i>
                        By {{ $recipe->user->name }}
                    </div>
                </div>
                <p class="text-gray-600 mb-8 text-lg">{{ $recipe->description }}</p>
    
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div>
                        <div class="bg-gray-300 rounded-lg shadow-lg p-6 mb-8">
                            <h2 class="text-2xl font-semibold mb-4 flex items-center text-gray-800">
                                <i class="fas fa-list-ul mr-3 text-indigo-600"></i>
                                Ingredients
                            </h2>
                            <div class="prose max-w-none">
                                {!! nl2br(e($recipe->ingredients)) !!}
                            </div>
                        </div>
    
                        <div class="bg-gray-300 rounded-lg shadow-lg p-6">
                            <h2 class="text-2xl font-semibold mb-4 flex items-center text-gray-800">
                                <i class="fas fa-tasks mr-3 text-indigo-600"></i>
                                Instructions
                            </h2>
                            <div class="prose max-w-none">
                                {!! nl2br(e($recipe->instructions)) !!}
                            </div>
                        </div>
                    </div>
    
                    <!-- Right Column -->
                    <div>
                        <div class="bg-gray-300 rounded-lg shadow-lg p-6 mb-6">
                            <h2 class="text-2xl font-semibold mb-4 flex items-center text-gray-800">
                                <i class="fas fa-info-circle mr-3 text-indigo-600"></i>
                                Recipe Details
                            </h2>
                            <div class="grid grid-cols-2 gap-6">
                                <div class="bg-white p-4 rounded-lg shadow">
                                    <p class="text-gray-600 flex items-center">
                                        <i class="fas fa-clock mr-2 text-indigo-500"></i>
                                        Preparation Time
                                    </p>
                                    <p class="font-medium text-lg">{{ $recipe->preparation_time }} minutes</p>
                                </div>
                                <div class="bg-white p-4 rounded-lg shadow">
                                    <p class="text-gray-600 flex items-center">
                                        <i class="fas fa-fire mr-2 text-indigo-500"></i>
                                        Cooking Time
                                    </p>
                                    <p class="font-medium text-lg">{{ $recipe->cooking_time }} minutes</p>
                                </div>
                                <div class="bg-white p-4 rounded-lg shadow">
                                    <p class="text-gray-600 flex items-center">
                                        <i class="fas fa-chart-line mr-2 text-indigo-500"></i>
                                        Difficulty
                                    </p>
                                    <p class="font-medium text-lg">{{ $recipe->difficulty_level }}</p>
                                </div>
                                <div class="bg-white p-4 rounded-lg shadow">
                                    <p class="text-gray-600 flex items-center">
                                        <i class="fas fa-globe-asia mr-2 text-indigo-500"></i>
                                        Cuisine
                                    </p>
                                    <p class="font-medium text-lg">{{ $recipe->cuisine->name }}</p>
                                </div>
                            </div>
                        </div>
    
                        @if($recipe->cooking_tips)
                        <div class="bg-yellow-50 rounded-lg shadow-lg p-6 mb-6">
                            <h2 class="text-2xl font-semibold mb-4 flex items-center text-gray-800">
                                <i class="fas fa-lightbulb mr-3 text-yellow-500"></i>
                                Cooking Tips
                            </h2>
                            <div class="prose max-w-none">
                                {!! nl2br(e($recipe->cooking_tips)) !!}
                            </div>
                        </div>
                        @endif
    
                        @if($recipe->personal_notes && auth()->id() === $recipe->user_id)
                        <div class="bg-blue-50 rounded-lg shadow-lg p-6">
                            <h2 class="text-2xl font-semibold mb-4 flex items-center text-gray-800">
                                <i class="fas fa-bookmark mr-3 text-blue-500"></i>
                                Personal Notes
                            </h2>
                            <div class="prose max-w-none">
                                {!! nl2br(e($recipe->personal_notes)) !!}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
    
                <!-- Comments Section -->
                <div class="mt-12">
                    <h2 class="text-2xl font-semibold mb-6 flex items-center text-gray-800">
                        <i class="fas fa-comments mr-3 text-indigo-600"></i>
                        Community Discussion
                    </h2>
                    
                    @auth
                        <form action="{{ route('recipes.comments.add', $recipe) }}" method="POST" class="mb-8">
                            @csrf
                            <div class="mb-4">
                                <label for="content" class="block text-sm font-medium text-gray-700">Add a Comment</label>
                                <textarea 
                                    name="content" 
                                    id="content" 
                                    rows="3" 
                                    class="mt-1 p-2 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition-colors duration-200 outline-none" 
                                    required
                                    placeholder="Share your thoughts about this recipe..."
                                ></textarea>
                            </div>
                            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transform hover:scale-105 transition-all duration-200 flex items-center">
                                <i class="fas fa-paper-plane mr-2"></i>
                                Post Comment
                            </button>
                        </form>
                    @else
                        <div class="bg-gray-50 rounded-lg p-6 text-center mb-8">
                            <p class="text-gray-600">
                                <i class="fas fa-lock mr-2"></i>
                                Please <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800 font-medium">login</a> to join the discussion.
                            </p>
                        </div>
                    @endauth
    
                    <div class="space-y-6">
                        @foreach($recipe->comments()->latest()->get() as $comment)
                            <div class="bg-gray-50 rounded-lg shadow-lg p-6 transform hover:scale-101 transition-all duration-200">
                                <div class="flex items-start space-x-3">
                                    <div class="flex-1">
                                        <div class="flex items-center justify-between">
                                            <h3 class="text-md font-medium text-gray-900 flex items-center">
                                                @if($comment->user->avatar)
                                                    <img src="{{ asset('storage/' . $comment->user->avatar) }}" 
                                                         alt="{{ $comment->user->name }}'s avatar" 
                                                         class="w-8 h-8 rounded-full object-cover mr-2"
                                                    />
                                                @else
                                                    <i class="fas fa-user-circle mr-2 text-gray-500 text-2xl"></i>
                                                @endif
                                                {{ $comment->user->name }}
                                            </h3>
                                            <p class="text-sm text-gray-500 flex items-center">
                                                <i class="fas fa-clock mr-2"></i>
                                                {{ $comment->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                        <div class="mt-2 text-gray-700">
                                            <p>{{ $comment->content }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-layout>