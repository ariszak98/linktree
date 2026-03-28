@props(['href'])


<a href="{{ $href }}"
        {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 border border-blue-100 rounded-sm hover:bg-blue-50 transition']) }}>
    {{ $slot }}
</a>
