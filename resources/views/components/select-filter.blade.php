@props(['name', 'options', 'all' => 'All'])

<select 
    name="{{ $name }}" 
    onchange="this.form.submit()" 
    {{ $attributes->merge(['class' => 'px-4 py-2 rounded bg-gray-200 cursor-pointer hover:bg-gray-300 transition']) }}
>
    <option value="">{{ $all }}</option>
    @foreach($options as $value => $label)
        <option value="{{ $value }}" {{ request($name) == $value ? 'selected' : '' }}>
            {{ $label }}
        </option>
    @endforeach
</select>
