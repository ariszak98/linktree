@props(['href'])

<a href="{{ $href }}"
        {{ $attributes->merge(['class' => 'block w-full text-center bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition font-bold']) }}>
    {{ $slot }}
</a>
