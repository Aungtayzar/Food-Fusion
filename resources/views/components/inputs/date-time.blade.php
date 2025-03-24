@props(['label'=>null,'type'=>'datetime-local','name','id','value'=>''])

<label for="{{ $id }}" class="block text-sm font-medium text-gray-700 mb-1">{{ $label }}</label>
<input type="datetime-local" class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 @error($name) border-red-500 @enderror" id="{{ $id }}" name="{{ $name }}" value="{{ old($name,$value) }}" {{ $type == 'start_date' ? 'required': '' }}>
@error($name)
<p class="mt-1 text-sm text-red-600">{{ $message }}</p>
@enderror