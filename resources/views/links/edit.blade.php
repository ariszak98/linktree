<x-layout>
    <div class="flex-1 flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-2xl">


            <x-text.h2>Edit Link</x-text.h2>

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
                        <x-forms.radio name="is_active" value="1" checked="{{ $link->is_active ? 1 : 0 }}">
                            Active
                        </x-forms.radio>

                        <x-forms.radio name="is_active" value="0" checked="{{ !$link->is_active ? 1 : 0 }}">
                            Inactive
                        </x-forms.radio>
                    </div>
                </div>

                <x-buttons.submit-wide>Update Link</x-buttons.submit-wide>
            </form>

            <form method="POST" action="{{ route('links.destroy', $link) }}">
                @csrf
                @method('DELETE')
                <x-buttons.submit-wide-red>Remove Link</x-buttons.submit-wide-red>
            </form>

            <p class="mt-4 text-center text-gray-600">
                Back to
                <x-text.link href="{{ route('home') }}">Links.</x-text.link>
            </p>


            @foreach($errors->all() as $error)
                <li class="text-red-500 text-sm mt-2">{{ $error }}</li>
            @endforeach


        </div>
    </div>
</x-layout>
