@props(['label'=>null,'name','value'=>'','id','placeholder'=>'','rows'=>'7','cols'=>'30'])
<div class="mt-4">
    @if($label)
    <label class="block text-gray-700 font-bold mb-2">{{$label}}</label>
    @endif
    <textarea 
        cols="{{$cols}}"
        rows="{{$rows}}"
        name="{{$name}}"
        placeholder="{{$placeholder}}" 
        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-orange-500 h-24"
    >{{old($name,$value)}}</textarea>
    @error($name)
      <p class="text-red-500 text-sm mt-1">{{$message}}</p>    
    @enderror
</div>