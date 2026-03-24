<x-layout>
    <div class="flex-1 flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-2xl">
            <h2 class="text-2xl font-bold mb-6 text-center">Edit Link</h2>
            <form method="POST" action="{{ route('links.update', $link) }}">
                @csrf
                @method('PATCH')
                <div class="mb-4">

                    <div class="flex items-center gap-2 mb-2">
                        <label for="url" class="text-gray-700">Link URL</label>

                        <a href="{{ $link->url }}" target="_blank"
                           class="text-blue-400 hover:text-blue-800 transition">
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
                    </div>


                    <input type="text" id="url" name="url" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                        value="{{ $link->url  }}">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 mb-2">Description</label>
                    <textarea type="text" id="description" name="description"
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                              rows="3"
                    >{{ $link->description  }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Status</label>
                    <div class="flex gap-2">
                        <!-- ACTIVE -->
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="is_active" value="1"
                                   class="text-blue-600 focus:ring-blue-500"
                                {{ $link->is_active ? 'checked' : '' }}>
                            <span class="text-gray-700">Active</span>
                        </label>

                        <!-- INACTIVE -->
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="is_active" value="0"
                                   class="text-blue-600 focus:ring-blue-500"
                                {{ !$link->is_active ? 'checked' : '' }}>
                            <span class="text-gray-700">Inactive</span>
                        </label>
                    </div>
                </div>

                <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                    Update Link
                </button>
            </form>

            <form method="POST" action="{{ route('links.destroy', $link) }}">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="mt-1 w-full bg-red-700/50 text-white py-2 rounded-lg hover:bg-red-700/80 transition">
                    Remove
                </button>
            </form>
            <p class="mt-4 text-center text-gray-600">
                Back to
                <a href="/" class="text-blue-600 hover:underline">Links</a>.
            </p>


            @foreach($errors->all() as $error)
                <li class="text-red-500 text-sm mt-2">{{ $error }}</li>
            @endforeach


        </div>
    </div>
</x-layout>
