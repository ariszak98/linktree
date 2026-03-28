<button type="submit"
        {{ $attributes->merge(['class' => 'mt-1 w-full bg-red-700/50 text-white py-2 rounded-lg hover:bg-red-700/80 transition']) }}>
    {{ $slot }}
</button>
