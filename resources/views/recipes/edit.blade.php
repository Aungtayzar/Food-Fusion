<x-layout>
    <div class="container mx-auto px-4 py-8">
        <form class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6" action="{{route('recipes.update',$recipe->id)}}" method="POST" enctype="multipart/form-data">
            @csrf 
            @method('PUT')
            <h2 class="text-3xl font-bold text-center mb-6 text-orange-500">Update Your Fusion Recipe</h2>
            
            <!-- Recipe Basic Information -->

            <div class="mb-2">
                <x-inputs.text label="Recipe Title" name="title" id="title" placeholder="e.g., Korean-Mexican Bulgogi Tacos" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-orange-500" :value="old('title',$recipe->title)" />
            </div>

            {{-- Recipe pre time and cooking time  --}}
            <div class="grid md:grid-cols-2 gap-4">
                <x-inputs.number id="preparation_time" name="preparation_time" label="Preparation Time" placeholder="Minutes" :value="old('preparation_time',$recipe->preparation_time)" />

                <x-inputs.number id="cooking_time" name="cooking_time" label="Cooking Time" placeholder="Minutes" :value="old('cooking_time',$recipe->cooking_time)"/>

            </div>

            <!-- Description -->
            <x-inputs.text-area label="Recipe Description" name="description" id="description" placeholder="Describe your fusion recipe's inspiration and unique flavors" :value="old('description',$recipe->description)"/>

            <!-- Ingredients Section -->
            <div class="mt-4">
                <label class="block text-gray-700 font-bold mb-2">Ingredients</label>
                <x-inputs.text name="ingredients" id="ingredients" placeholder="Ingredient" class="w-full mr-2 px-3 py-2 border rounded-lg focus:outline-none focus:border-orange-500" :value="old('ingredients',$recipe->ingredients)"/>                
             </div>

            <!-- Instructions Section -->
            <div class="mt-4">
                <x-inputs.text label="Cooking Instructions" name="instructions" id="instructions" placeholder="Step description" class="w-full mr-2 px-3 py-2 border rounded-lg focus:outline-none focus:border-orange-500" :value="old('instructions',$recipe->instructions)"/>
            </div>

            <!-- Cuisine and Difficulty -->
            <div class="grid md:grid-cols-2 gap-4 mt-4">
                <x-inputs.select label="Cuisine Type" name="cuisine_id" id="cuisine_id" :options="$cuisines" :value="$recipe->cuisine_id" />
                <x-inputs.select id="difficulty_level" name="difficulty_level" label="Difficulty Level" :options="['easy' => 'Easy', 'medium' => 'Medium', 'hard' => 'Hard']" :value="$recipe->difficulty_level" />
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