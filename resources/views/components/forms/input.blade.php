@props(['type' => 'text', 'id', 'name'])

<input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}"
        {{ $attributes->merge(['class' => 'w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300']) }}>
