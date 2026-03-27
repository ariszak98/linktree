<div {{ $attributes->merge(['class' => 'flex-1 flex justify-center items-center gap-2']) }}>
    <p class="text-center text-gray-800 font-medium text-base">
        {{ $slot }}
    </p>
</div>
