@props(['label'=>null,'type'=>'text','placeholder'=>'','value'=>'','id','name','class'=>''])
    @if($label)
    <label class="block text-gray-700 font-bold mb-2" for="{{$id}}">{{$label}}</label>
    @endif
    <input 
        type="{{$type}}" 
        name="{{$name}}"
        placeholder="{{$placeholder}}" 
        class="{{$class}}"
        value="{{$value}}"
    />
