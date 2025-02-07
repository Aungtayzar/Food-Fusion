<x-layout>
    <!-- Featured Recipes  -->
    <section class="container mx-auto py-12 px-4">
        <h2 class="text-2xl md:text-3xl font-bold text-center mb-8">Featured Fusion Recipes</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            @forelse($recipes as $recipe)
            <x-recipe-card :recipe="$recipe"/>
            @empty
            <li>No recipe Found</li>
            @endforelse            
        </div>
    </section>
</x-layout>