<x-layout>
    <div class="container mx-auto px-4 py-8">
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