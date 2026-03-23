<x-layout>
    <div class="flex-1 flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-2xl">
            <h2 class="text-2xl font-bold mb-6 text-center">Create new Link</h2>
            <form method="POST" action="{{ route('links.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="url" class="block text-gray-700 mb-2">Link URL</label>
                    <input type="text" id="url" name="url" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                           >
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 mb-2">Description</label>
                    <textarea type="text" id="description" name="description"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                           value="{{ old('description') }}"></textarea>
                </div>

                <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                    Create Link
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
