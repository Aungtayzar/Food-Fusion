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
            <div>
                @if(strtolower($recipe->difficulty_level) == 'easy')
                    <span class="text-xs font-medium px-2 py-1 rounded bg-green-100 text-green-800">
                        <i class="fas fa-smile-beam mr-1"></i>Easy
                    </span>
                @elseif(strtolower($recipe->difficulty_level) == 'medium')
                    <span class="text-xs font-medium px-2 py-1 rounded bg-yellow-100 text-yellow-800">
                        <i class="fas fa-meh mr-1"></i>Medium
                    </span>
                @elseif(strtolower($recipe->difficulty_level) == 'hard')
                    <span class="text-xs font-medium px-2 py-1 rounded bg-red-100 text-red-800">
                        <i class="fas fa-fire mr-1"></i>Hard
                    </span>
                @endif
            </div>
        </div>
        <div class="flex justify-between items-center">
            <span class="text-sm text-gray-500">Cooking Time: {{$recipe->cooking_time}}</span>
            <button class="bg-orange-500 text-white px-4 py-2 rounded"><a href="{{route('recipes.show',$recipe->id)}}">View Recipe</a></button>
        </div>
    </div>
</div>