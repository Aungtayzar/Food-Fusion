<x-layout>
    <div class="container mx-auto px-4 py-8">
        <!-- Back Button -->
        <a href="{{ route('recipes.index') }}" class="inline-flex items-center mb-6 text-indigo-600 hover:text-indigo-800 transition-colors duration-200">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Recipes
        </a>
        <form class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6" action="{{route('recipes.store')}}" method="POST" enctype="multipart/form-data">
            @csrf 
            <h2 class="text-3xl font-bold text-center mb-6 text-orange-500">Create Your Fusion Recipe</h2>

            
            
            <!-- Recipe Basic Information -->

            <div class="mb-2">
                <x-inputs.text label="Recipe Title" name="title" id="title" placeholder="e.g., Korean-Mexican Bulgogi Tacos" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-orange-500" />
            </div>

            {{-- Recipe pre time and cooking time  --}}
            <div class="grid md:grid-cols-2 gap-4">
                <x-inputs.number id="preparation_time" name="preparation_time" label="Preparation Time" placeholder="Minutes" />

                <x-inputs.number id="cooking_time" name="cooking_time" label="Cooking Time" placeholder="Minutes" />

            </div>

            <!-- Description -->
            <x-inputs.text-area label="Recipe Description" name="description" id="description" placeholder="Describe your fusion recipe's inspiration and unique flavors"/>

            <!-- Ingredients Section -->
            <div class="mt-4">
                <label class="block text-gray-700 font-bold mb-2">Ingredients</label>
                <x-inputs.text name="ingredients" id="ingredients" placeholder="Ingredient" class="w-full mr-2 px-3 py-2 border rounded-lg focus:outline-none focus:border-orange-500" />                
             </div>

            <!-- Instructions Section -->
            <div class="mt-4">
                <x-inputs.text label="Cooking Instructions" name="instructions" id="instructions" placeholder="Step description" class="w-full mr-2 px-3 py-2 border rounded-lg focus:outline-none focus:border-orange-500" />
            </div>

            <!-- Cuisine and Difficulty -->
            <div class="grid md:grid-cols-2 gap-4 mt-4">
                <x-inputs.select label="Cuisine Type" name="cuisine_id" id="cuisine_id" :options="$cuisines" />
                <x-inputs.select label="Difficulty Level" name="difficulty_level" id="difficulty_level" :options="['easy'=>'Easy','medium'=>'Medium','hard'=>'Hard']" />
            </div>

            <!-- Dietary Preferences -->
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Dietary Preferences</label>
                <select name="dietary_preferences[]" id="dietary_preferences" multiple class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-orange-500">
                    @foreach($dietaryPreferences as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                   @endforeach
                </select>
            </div>

            <!-- Cooking Tips-->
            <div class="mt-4">
                <x-inputs.text-area label="Cooking Tips" name="cooking_tips" id="cooking_tips" placeholder="Write Some Cooking tips"/>
            </div>

            <!-- Personal notes-->
            <div class="mt-4">
                <x-inputs.text-area label="Personal Notes" name="personal_notes" id="personal_notes" placeholder="Take a notes!"/>
            </div>

            <!-- Image Upload -->
            <x-inputs.file label="Recipe Image" name="image" id="image" />
            
            

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="w-full bg-orange-500 text-white py-3 rounded-lg hover:bg-orange-600">
                    Create Recipe
                </button>
            </div>
        </form>
    </div>
</x-layout>