    <!-- FoodFusion Mission Introduction Section -->
    <section class="py-12 bg-gray-200">
        <div class="container px-4">
            <div class="flex flex-col md:flex-row items-center gap-8">
                <!-- Image Column -->
                <div class="w-full md:w-1/2">
                    <img 
                        src="storage/heros/mission.jpg" 
                        alt="FoodFusion Mission" 
                        class="w-full rounded-lg h-auto object-cover"
                    >
                </div>
                
                <!-- Text Column -->
                <div class="w-full md:w-1/2 text-gray-700">
                    <h2 class="text-3xl font-bold  mb-4">Our Mission</h2>
                    <p class=" mb-6 text-lg">
                        At FoodFusion, we believe that cooking is an art that brings people together. Our mission is to inspire culinary creativity by connecting food enthusiasts from around the world, allowing them to share their unique recipes and cultural traditions.
                    </p>
                    <p class=" mb-6 text-lg">
                        Whether you're a professional chef or a home cook, FoodFusion provides a platform to discover new flavors, learn cooking techniques, and celebrate the diversity of global cuisine.
                    </p>
                    <a href="{{ route('recipes.index') }}" class="inline-block px-6 py-3 bg-orange-500 text-white font-medium rounded-lg hover:bg-orange-600 transition duration-300">
                        Explore Recipes
                    </a>
                </div>
            </div>
        </div>
    </section>