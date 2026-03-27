@props(['id', 'name'])


<textarea type="text" id="description" name="description"
          {{ $attributes->merge(['class' => 'w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300']) }}
          >{{ $slot }}</textarea>
