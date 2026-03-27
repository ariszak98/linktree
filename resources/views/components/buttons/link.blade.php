@props(['href'])

<a href="{{ $href }}"
        {{ $attributes->merge(['class' => 'inline-flex items-center justify-center bg-blue-600 text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-blue-700 transition']) }}>
    {{ $slot }}
</a>
