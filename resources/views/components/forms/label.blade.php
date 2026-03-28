@props(['for'])

<label for="{{ $for }}" {{ $attributes->merge(['class' => 'block text-sm font-semibold text-gray-700 mb-2']) }}>{{ $slot }}</label>
<!-- block text-gray-700 mb-2 -->
