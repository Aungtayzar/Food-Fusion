@props(['id','name','label'=>null,'value'=>'','options'=>[]])
<div>
    @if($label)
    <label class="block text-gray-700 font-bold mb-2">{{ $label }}</label>
    @endif
    <select name="{{ $name }}" id="{{ $id }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-orange-500">
        @foreach($options as $key => $value)
            <option value="{{ $key }}" {{ old($name) == $key ? 'selected' : '' }}>{{ $value }}</option>
        @endforeach
    </select>
</div>