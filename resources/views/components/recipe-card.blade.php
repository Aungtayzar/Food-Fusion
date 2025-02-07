@props(['recipe'])

<div class="bg-white shadow-lg rounded-lg overflow-hidden">
    <div class="h-48 bg-gray-300">
        @if($recipe->image)
        <img
            src="/storage/{{$recipe->image}}"
            alt="{{$recipe->image}}"
            class="h-full w-full object-cover"
        />
        @endif
    </div>
    <div class="p-4">
        <h3 class="font-bold text-xl mb-2">{{$recipe->title}}</h3>
        <div class="flex items-center mb-2">
            <i class="fas fa-star text-yellow-400 mr-1"></i>
            <span>4.5 (120 reviews)</span>
        </div>
        <div class="flex justify-between items-center">
            <span class="text-sm text-gray-500">Cooking Time: {{$recipe->cooking_time}}</span>
            <button class="bg-orange-500 text-white px-4 py-2 rounded"><a href="{{route('recipes.show',$recipe->id)}}">View Recipe</a></button>
        </div>
    </div>
</div>