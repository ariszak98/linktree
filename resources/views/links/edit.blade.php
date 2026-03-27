<x-layout>
    <div class="flex-1 flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-2xl">


            <h2 class="text-2xl font-bold mb-6 text-center">Edit Link</h2>

            <form method="POST" action="{{ route('links.update', $link) }}">
                @csrf
                @method('PATCH')

                <div class="mb-4">

                    <div class="flex items-center gap-2 mb-2">
                        <x-forms.label for="url">Link URL</x-forms.label>
                        <x-ui.external-link href="{{ $link->url }}"/>
                    </div>

                    <x-forms.input type="text" name="url" id="url" value="{{ $link->url  }}" required/>

                </div>

                <div class="mb-4">

                    <x-forms.label for="description">Description</x-forms.label>
                    <x-forms.textarea id="description" name="description" rows="3">{{ $link->description  }}</x-forms.textarea>

                </div>

                <div class="mb-4">
                    <x-forms.label for="is_active">Status</x-forms.label>

                    <div class="flex gap-2">

                        <!-- ACTIVE -->
                        <x-forms.radio name="is_active" value="1" checked="{{ $link->is_active ? 1 : 0 }}">Active</x-forms.radio>

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
