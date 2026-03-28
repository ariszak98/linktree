<button
        type="submit"
        {{ $attributes->merge(['class' => 'inline-flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2 text-white font-medium hover:bg-blue-700 transition']) }}
>
    {{ $slot }}
</button>
