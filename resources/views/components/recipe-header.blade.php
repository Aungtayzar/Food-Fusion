<!-- Recipes Header -->
@props(['headermsg'=>'','submsg'=>''])
<header class="bg-gradient-to-r from-orange-400 to-red-500 text-white text-center py-12">
    <h1 class="text-4xl font-bold mb-4">{{$headermsg}}</h1>
    @if($submsg)
    <p class="text-lg md:text-xl mb-8">{{$submsg}}</p>
    @endif
    <x-search />
</header>