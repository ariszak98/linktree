<div {{ $attributes->merge(['class' => 'bg-white border border-dashed border-gray-300 rounded-2xl min-h-24 flex items-center justify-center px-6 py-6']) }}>
    <p class="text-gray-500 text-center">
        {{ $slot }}
    </p>
</div>
