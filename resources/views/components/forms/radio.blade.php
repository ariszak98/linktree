@props(['name', 'value', 'checked' => false])


<label {{ $attributes->merge(['class' => 'flex items-center gap-2 cursor-pointer']) }}>
    <input
        type="radio"
        name="{{ $name }}"
        value="{{ $value }}"
        @checked($checked)
        class="text-blue-600 focus:ring-blue-500"
    >

    <span class="text-gray-700">{{ $slot }}</span>
</label>
