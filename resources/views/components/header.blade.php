   <!-- Navigation  -->
   <header class="bg-orange-500 text-white" x-data="{open:false}">
    <div class="mx-auto flex justify-between items-center p-3">
        <div class="text-2xl font-bold w-full md:w-auto md:text-left mb-2 md:mb-0"><a href="./index.html">Food Fusion</a></div>
        <nav class="hidden md:flex bg-orange-500  p-4 justify-between items-center">
            <div class="flex flex-wrap justify-center w-full md:w-auto space-x-2 md:space-x-4">
                <x-nav-link url="/recipes" :active="request()->is('recipes')">Recipes</x-nav-link>
                <x-nav-link url="/cuisines" :active="request()->is('cuisines')">Cuisines</x-nav-link>
                <x-nav-link url="/community" :active="request()->is('community')">Community</x-nav-link>
                <x-button-link url="/recipes/create" icon="edit" >Create Recipe</x-button-link>
                <x-button-link url="/loginandregister">Login and Register</x-button-link>
            </div>
        
        </nav>
        <button id="hamburger" @click="open = !open" class="text-white md:hidden flex items-center">
            <i class="fa fa-bars text-2xl"></i>
         </button>
    </div>
    <!-- Mobile Navigation  -->
    <div    x-show="open"
            @click.away="open = false"
            id="mobile-menu"
            class="md:hidden bg-orange-500 text-white mt-5 pb-4 space-y-2"
        >

            <x-nav-link url="/recipes" :active="request()->is('recipes')" :mobile="true">Recipes</x-nav-link>
            <x-nav-link url="/cuisines" :active="request()->is('cuisines')" :mobile="true">Cuisines</x-nav-link>
            <x-nav-link url="/community" :active="request()->is('community')" :mobile="true">Community</x-nav-link>
            <a href="./loginandregister.html" class="block px-4 py-2 hover:bg-orange-700"
                >Login</a
            >
            <x-button-link url="/recipes/create" icon="edit" >Create Recipe</x-button-link>
            <x-button-link url="/loginandregister">Login and Register</x-button-link>
        </div>
</header>