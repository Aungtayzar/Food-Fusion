<div class="flex justify-center items-center relative shadow-lg rounded mx-auto w-full max-w-3xl">
    <form method="GET"
    action="{{ route('recipes.search') }}" class="w-full">
        <div class="relative w-full">
            <input 
                type="text" 
                name="search"
                placeholder="Search fusion recipes..." 
                value="{{ request('search') }}"
                class="px-12 outline-none py-3 rounded-full w-full text-gray-800"
            />
            <button type="submit" class="absolute top-1/2 -translate-y-1/2 left-4">
                <i class="fa-solid fa-magnifying-glass text-gray-500"></i>
            </button>
        </div>
    </form>
</div>