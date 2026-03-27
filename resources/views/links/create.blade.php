<x-layout>
    <div class="flex-1 flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-2xl">


            <x-text.h2>Create new Link</x-text.h2>

            <form method="POST" action="{{ route('links.store') }}">
                @csrf

                <div class="mb-4">
                    <x-forms.label for="url">Link URL</x-forms.label>
                    <x-forms.input id="url" name="url" type="text" value="{{ old('url') }}" required/>
                </div>

                <div class="mb-4">
                    <x-forms.label for="description">Description</x-forms.label>
                    <x-forms.textarea value="{{ old('description') }}"/>
                </div>

                <x-buttons.submit-wide>Create Link</x-buttons.submit-wide>

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
