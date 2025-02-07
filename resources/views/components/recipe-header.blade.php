<!-- Recipes Header -->
@props(['headermsg'=>'','submsg'=>''])
<header class="bg-gradient-to-r from-orange-400 to-red-500 text-white text-center py-12">
    <h1 class="text-4xl font-bold mb-4">{{$headermsg}}</h1>
    @if($submsg)
    <p class="text-lg md:text-xl mb-8">{{$submsg}}</p>
    @endif
    <div class="flex justify-center items-center relative shadow-lg rounded max-w-2xl mx-auto">
        <input 
            type="text" 
            placeholder="Search fusion recipes..." 
            class="px-12 outline-none py-3 rounded-full w-full text-gray-800"
        />
        <i class="fa-solid fa-magnifying-glass absolute left-4 text-gray-500"></i>
    </div>
</header>