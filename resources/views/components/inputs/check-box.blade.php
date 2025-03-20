@props(['type'=>'checkbox','id','name','label'=>null,'value'=>''])
<input type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="{{ $id }}" name="{{ $name }}" value="1" {{ old($name,$value) ? 'checked' : '' }}>
<label class="ml-2 text-sm text-gray-700" for="{{ $id }}">{{ $label }}</label>