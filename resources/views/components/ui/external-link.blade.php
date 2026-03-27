@props(['href'])

<a href="{{ $href }}" target="_blank"
        {{ $attributes->merge(['class' => 'mb-2 text-blue-400 hover:text-blue-800 transition']) }}>
    <svg xmlns="http://www.w3.org/2000/svg"
         class="h-4 w-4"
         fill="none"
         viewBox="0 0 24 24"
         stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M14 3h7m0 0v7m0-7L10 14"/>
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M5 5v14h14"/>
    </svg>
</a>
