@props(['label'=>null,'type'=>'number','id','name','placeholder'=>'','value'=>''])
<div>
    @if($label)
    <label class="block text-gray-700 font-bold mb-2" for="{{$id}}">{{$label}}</label>
    @endif
    <input 
        name="{{$name}}"
        type="{{$type}}" 
        placeholder="{{$placeholder}}"
        value="{{old($name,$value)}}" 
        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-orange-500"
    />
</div>