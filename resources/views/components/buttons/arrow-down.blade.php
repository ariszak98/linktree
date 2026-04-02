{{--<button type="button"--}}
{{--        {{ $attributes->merge(['class' => 'p-1.5 rounded-md text-gray-500 hover:text-blue-600 hover:bg-blue-50 transition']) }}>--}}
{{--    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"--}}
{{--         fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
{{--              d="M19 9l-7 7-7-7"/>--}}
{{--    </svg>--}}
{{--</button>--}}


    <svg {{ $attributes->merge([
            'class' => 'h-4 w-4 text-gray-500 group-hover:text-blue-600 transition'
        ]) }}
         xmlns="http://www.w3.org/2000/svg"
         fill="none"
         viewBox="0 0 24 24"
         stroke="currentColor">

        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M19 9l-7 7-7-7"/>
    </svg>
