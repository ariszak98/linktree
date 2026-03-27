<x-layout>
    <div class="w-full max-w-4xl mx-auto">

        <!-- PAGE HEADER -->
        <div class="mb-8 flex justify-between items-center">

            <!-- LEFT -->
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Profile Settings</h1>
                <p class="mt-2 text-gray-500">
                    Customize your public profile page.
                </p>
            </div>

            <!-- RIGHT -->
            <a href="#"
               class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 border border-blue-100 rounded-sm hover:bg-blue-50 transition">
                View Public Profile
            </a>

        </div>

        <!-- PROFILE CARD -->
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-6 sm:p-8">

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PATCH')

                <!-- AVATAR SECTION -->
                <section class="flex flex-col items-center text-center">
                    <div class="relative">
                        <div class="w-28 h-28 rounded-full overflow-hidden border-3 border-blue-100 shadow-sm bg-gray-100 flex items-center justify-center">
                            @if(auth()->user()->profile?->avatar)
                                <img
                                    src="{{ asset('storage/' . auth()->user()->profile->avatar) }}"
                                    alt="User avatar"
                                    class="w-full h-full object-cover"
                                >
                            @else
                                <span class="text-3xl font-semibold text-gray-400">
                                    {{ strtoupper(substr(auth()->user()->username, 0, 1)) }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="mt-4">
                        <label for="avatar" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition cursor-pointer">
                            Upload Avatar
                        </label>
                        <input
                            id="avatar"
                            name="avatar"
                            type="file"
                            class="hidden"
                            accept="image/*"
                        >
                    </div>

                    @error('avatar')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </section>

                <!-- DESCRIPTION SECTION -->
                <section>
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                        Page Description
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        rows="5"
                        placeholder="Write a short description for your public page..."
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-gray-800 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none"
                    >{{ old('description', auth()->user()->profile?->description) }}</textarea>

                    <p class="mt-2 text-sm text-gray-500">
                        This will appear on your public profile.
                    </p>

                    @error('description')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </section>

                <!-- BACKGROUND PICKER -->
                <section>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                        Choose Background
                    </label>

                    <div class="flex flex-wrap gap-4">

                        <!-- WHITE -->
                        <label class="cursor-pointer">
                            <input
                                type="radio"
                                name="background_color"
                                value="white"
                                class="sr-only peer"
                                {{ old('background_color', auth()->user()->profile?->background_color ?? 'white') === 'white' ? 'checked' : '' }}
                            >
                            <div class="w-16 h-16 rounded-xl border-2 border-gray-300 bg-white shadow-sm peer-checked:border-blue-600 peer-checked:ring-2 peer-checked:ring-blue-200 transition"></div>
                        </label>

                        <!-- LIGHT GRAY -->
                        <label class="cursor-pointer">
                            <input
                                type="radio"
                                name="background_color"
                                value="gray"
                                class="sr-only peer"
                                {{ old('background_color', auth()->user()->profile?->background_color) === 'gray' ? 'checked' : '' }}
                            >
                            <div class="w-16 h-16 rounded-xl border-2 border-gray-300 bg-gray-200 shadow-sm peer-checked:border-blue-600 peer-checked:ring-2 peer-checked:ring-blue-200 transition"></div>
                        </label>

                        <!-- BLUE -->
                        <label class="cursor-pointer">
                            <input
                                type="radio"
                                name="background_color"
                                value="blue"
                                class="sr-only peer"
                                {{ old('background_color', auth()->user()->profile?->background_color) === 'blue' ? 'checked' : '' }}
                            >
                            <div class="w-16 h-16 rounded-xl border-2 border-gray-300 bg-blue-400 shadow-sm peer-checked:border-blue-600 peer-checked:ring-2 peer-checked:ring-blue-200 transition"></div>
                        </label>

                        <!-- PINK -->
                        <label class="cursor-pointer">
                            <input
                                type="radio"
                                name="background_color"
                                value="pink"
                                class="sr-only peer"
                                {{ old('background_color', auth()->user()->profile?->background_color) === 'pink' ? 'checked' : '' }}
                            >
                            <div class="w-16 h-16 rounded-xl border-2 border-gray-300 bg-pink-300 shadow-sm peer-checked:border-blue-600 peer-checked:ring-2 peer-checked:ring-blue-200 transition"></div>
                        </label>

                        <!-- YELLOW -->
                        <label class="cursor-pointer">
                            <input
                                type="radio"
                                name="background_color"
                                value="yellow"
                                class="sr-only peer"
                                {{ old('background_color', auth()->user()->profile?->background_color) === 'yellow' ? 'checked' : '' }}
                            >
                            <div class="w-16 h-16 rounded-xl border-2 border-gray-300 bg-yellow-300 shadow-sm peer-checked:border-blue-600 peer-checked:ring-2 peer-checked:ring-blue-200 transition"></div>
                        </label>

                        <!-- GREEN -->
                        <label class="cursor-pointer">
                            <input
                                type="radio"
                                name="background_color"
                                value="green"
                                class="sr-only peer"
                                {{ old('background_color', auth()->user()->profile?->background_color) === 'green' ? 'checked' : '' }}
                            >
                            <div class="w-16 h-16 rounded-xl border-2 border-gray-300 bg-green-300 shadow-sm peer-checked:border-blue-600 peer-checked:ring-2 peer-checked:ring-blue-200 transition"></div>
                        </label>

                    </div>

                    @error('background_color')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </section>

                <!-- SUBMIT -->
                <section class="pt-2 flex items-center justify-between">
                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-5 py-3 text-white font-medium hover:bg-blue-700 transition"
                    >
                        Save Profile
                    </button>
                    <p class="mt-4 text-center text-gray-600">
                        Back to
                        <a href="/" class="text-blue-600 hover:underline">Links</a>.
                    </p>
                </section>
            </form>
        </div>
    </div>
</x-layout>
