@props(['id','name','label'=>null,'value'=>'','options'=>[]])
<div>
    @if($label)
    <label class="block text-gray-700 font-bold mb-2">{{ $label }}</label>
    @endif
    <select name="{{ $name }}" id="{{ $id }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-orange-500">
        @foreach($options as $key => $optionValue)
            <option value="{{ $key }}" {{ old($name,$value) == $key ? 'selected' : '' }}>{{ $optionValue }}</option>
        @endforeach
    </select>
    @error($name)
      <p class="text-red-500 text-sm mt-1">{{$message}}</p>
    @enderror 
</div>