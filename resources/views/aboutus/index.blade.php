<x-layout>
    <!-- Hero Section -->
    <section class="relative bg-orange-500 text-white py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">About FoodFusion</h1>
                <p class="text-xl opacity-90">Bringing culinary creativity and cultural traditions together</p>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-16 bg-white" style="clip-path: polygon(0 100%, 100% 0, 100% 100%, 0% 100%);"></div>
    </section>

    <!-- Our Story Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="w-full md:w-1/2">
                    <img src="{{ asset('storage/aboutus/aboutusbanner.jpg') }}" alt="Our Story" class="rounded-lg shadow-xl w-full h-auto">
                </div>
                <div class="w-full md:w-1/2">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Our Story</h2>
                    <p class="text-gray-600 mb-4">
                        FoodFusion was born from a simple idea: that food has the power to connect people across cultures and distances. Founded in 2023, our platform began as a small community of passionate home cooks sharing family recipes.
                    </p>
                    <p class="text-gray-600 mb-4">
                        Today, we've grown into a global hub for culinary exploration, where professional chefs and cooking enthusiasts alike can discover new flavors, techniques, and traditions from around the world.
                    </p>
                    <p class="text-gray-600">
                        Our journey is just beginning, and we invite you to be part of our growing community of food lovers who believe in the magic that happens when diverse culinary traditions come together.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Philosophy Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Our Culinary Philosophy</h2>
                <p class="text-gray-600">The principles that guide everything we do at FoodFusion</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-lg shadow-md hover:scale-105 transition duration-300">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="fa-solid fa-globe"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3 text-center">Cultural Respect</h3>
                    <p class="text-gray-600 text-center">
                        We honor the origins of every recipe and technique, celebrating the diverse cultural contexts that make global cuisine so rich and varied.
                    </p>
                </div>
                
                <div class="bg-white p-8 rounded-lg shadow-md hover:scale-105 transition duration-300">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3 text-center">Creative Innovation</h3>
                    <p class="text-gray-600 text-center">
                        We believe in pushing culinary boundaries, encouraging experimentation that leads to exciting new flavor combinations and cooking methods.
                    </p>
                </div>
                
                <div class="bg-white p-8 rounded-lg shadow-md hover:scale-105 transition duration-300">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="fa-solid fa-people-group"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3 text-center">Community Connection</h3>
                    <p class="text-gray-600 text-center">
                        We foster a supportive environment where food lovers can share knowledge, learn from each other, and build meaningful connections.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values Section -->
    <section class="py-16 bg-gray-200 shadow-lg rounded-lg">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row-reverse items-center gap-12">
                <div class="w-full md:w-1/2">
                    <img src="{{ asset('storage/aboutus/overvalue.jpg') }}" alt="Our Values" class="rounded-lg shadow-xl w-full h-auto">
                </div>
                <div class="w-full md:w-1/2">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Our Values</h2>
                    
                    <div class="mb-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Authenticity</h3>
                        <p class="text-gray-600">
                            We value genuine expression and authentic recipes that tell the true stories of culinary traditions around the world.
                        </p>
                    </div>
                    
                    <div class="mb-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Inclusivity</h3>
                        <p class="text-gray-600">
                            We welcome cooks of all skill levels, backgrounds, and dietary preferences, ensuring everyone has a place at our table.
                        </p>
                    </div>
                    
                    <div class="mb-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Sustainability</h3>
                        <p class="text-gray-600">
                            We promote responsible cooking practices that respect our planet and support sustainable food systems.
                        </p>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Education</h3>
                        <p class="text-gray-600">
                            We believe in the power of knowledge sharing and lifelong learning in the culinary arts.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Meet Our Team Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Meet Our Team</h2>
                <p class="text-gray-600">The passionate food lovers behind FoodFusion</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Team Member 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('storage/aboutus/team-member/founder.jpg') }}" alt="Team Member" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-1">Johnson</h3>
                        <p class="text-orange-500 mb-3">Founder & CEO</p>
                        <p class="text-gray-600 mb-4">Former chef with a passion for bringing global cuisines to home kitchens.</p>
                        <div class="flex space-x-3">
                            <a href="#" class="text-gray-400 hover:text-blue-500">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-blue-700">
                                <i class="fa-brands fa-linkedin"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-blue-600">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Team Member 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('storage/aboutus/team-member/headofculinary.jpg') }}" alt="Team Member" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-1">Michael Chen</h3>
                        <p class="text-orange-500 mb-3">Head of Culinary Content</p>
                        <p class="text-gray-600 mb-4">Culinary school graduate with expertise in Asian and fusion cuisines.</p>
                        <div class="flex space-x-3">
                            <a href="#" class="text-gray-400 hover:text-blue-500">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-blue-700">
                                <i class="fa-brands fa-linkedin"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-blue-600">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Team Member 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('storage/aboutus/team-member/communitymanager.jpg') }}" alt="Team Member" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-1">Michel Richard</h3>
                        <p class="text-orange-500 mb-3">Community Manager</p>
                        <p class="text-gray-600 mb-4">Food blogger and social media expert who builds our vibrant community.</p>
                        <div class="flex space-x-3">
                            <a href="#" class="text-gray-400 hover:text-blue-500">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-blue-700">
                                <i class="fa-brands fa-linkedin"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-blue-600">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Team Member 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('storage/aboutus/team-member/headofsupport.jpg') }}" alt="Team Member" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-1">Edward Jone</h3>
                        <p class="text-orange-500 mb-3">Heard of Customer Support</p>
                        <p class="text-gray-600 mb-4">Experienced customer support leader and implementing innovative solutions to enhance customer satisfaction</p>
                        <div class="flex space-x-3">
                            <a href="#" class="text-gray-400 hover:text-blue-500">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-blue-700">
                                <i class="fa-brands fa-linkedin"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-blue-600">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </section>
              
                    
    <!-- Join Our Team Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="bg-orange-50 rounded-xl p-8 md:p-12 shadow-lg">
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <div class="w-full md:w-2/3">
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">Join Our Culinary Community</h2>
                        <p class="text-gray-600 mb-6">
                            FoodFusion is more than just a recipe platform—it's a community of passionate food lovers. Whether you're looking to share your recipes, discover new cuisines, or connect with fellow cooking enthusiasts, we welcome you to be part of our journey.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="{{ route('recipes.index') }}" class="inline-block px-6 py-3 bg-orange-500 text-white font-medium rounded-lg hover:bg-orange-600 transition duration-300 text-center">
                                Explore Recipes
                            </a>
                            <a href="{{ route('contactus.index') }}" class="inline-block px-6 py-3 bg-white text-orange-500 border border-orange-500 font-medium rounded-lg hover:bg-orange-50 transition duration-300 text-center">
                                Contact Us
                            </a>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3">
                        <img src="{{ asset('storage/aboutus/joinourteam.jpg') }}" alt="Join Our Team" class="rounded-lg shadow-md w-full h-auto">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Frequently Asked Questions</h2>
                <p class="text-gray-600">Everything you need to know about FoodFusion</p>
            </div>
            
            <div class="max-w-3xl mx-auto">
                <div class="mb-6 bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="flex justify-between items-center w-full px-6 py-4 text-left font-semibold text-gray-800 hover:bg-gray-50 focus:outline-none">
                        <span>How can I contribute recipes to FoodFusion?</span>
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="px-6 pb-4">
                        <p class="text-gray-600">
                            Simply create an account, navigate to "Create Recipe" and follow the guided process to share your culinary creations with our community.
                        </p>
                    </div>
                </div>
                
                <div class="mb-6 bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="flex justify-between items-center w-full px-6 py-4 text-left font-semibold text-gray-800 hover:bg-gray-50 focus:outline-none">
                        <span>Are all recipes on FoodFusion verified?</span>
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="px-6 pb-4">
                        <p class="text-gray-600">
                            While we don't test every recipe, our community feedback system helps ensure quality. Highly-rated recipes have typically been made successfully by multiple users.
                        </p>
                    </div>
                </div>
                
                <div class="mb-6 bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="flex justify-between items-center w-full px-6 py-4 text-left font-semibold text-gray-800 hover:bg-gray-50 focus:outline-none">
                        <span>How can I get involved beyond sharing recipes?</span>
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="px-6 pb-4">
                        <p class="text-gray-600">
                            You can participate by leaving reviews, joining discussions, attending our virtual cooking events, and sharing your cooking journey on social media with #FoodFusion.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>