<button type="submit"
        {{ $attributes->merge(['class' => 'w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition']) }}>
    {{ $slot }}
</button>
