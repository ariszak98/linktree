<x-layout>
    <div class="space-y-8">

        <!-- TOP SECTION -->
        <section class="bg-white border border-gray-200 rounded-sm p-6 shadow-sm">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <a href="{{ route('links.create') }}"
                   class="inline-flex items-center justify-center bg-blue-600 text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-blue-700 transition">
                    Add Link
                </a>

                <div class="flex flex-col sm:flex-row gap-3 sm:gap-6 text-sm sm:text-base">
                    <p class="text-gray-700">
                        Active:
                        <span class="font-bold text-blue-600">
                            {{ $activeLinksCount ?? 0 }}
                        </span>
                    </p>

                    <p class="text-gray-700">
                        Inactive:
                        <span class="font-bold text-red-600">
                            {{ $inactiveLinksCount ?? 0 }}
                        </span>
                    </p>
                </div>
            </div>
        </section>

        <hr class="border-gray-200">

        <!-- LINKS SECTION -->
        <section class="space-y-4">

            <a href="{{ route('profile.edit') }}"
               class="block w-full text-center bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition font-bold">
                Customise LinkTree
            </a>

            @forelse($links as $link)

                <a href="{{ route('links.edit', $link) }}" class="block group">
                    <div class="bg-white border border-blue-100 rounded-sm shadow-sm hover:shadow-md transition flex items-center justify-between px-5 py-3 relative">

                        @if($link->is_active)
                            <span class="absolute top-2 left-2 text-xs bg-green-100 text-green-700 px-2 py-0.5 rounded-full font-medium">Active</span>
                        @else
                            <span class="absolute top-2 left-2 text-xs bg-red-100 text-red-700 px-2 py-0.5 rounded-full font-medium">Inactive</span>
                        @endif

                        <!-- CENTER TEXT + ICON -->
                        <div class="flex-1 flex justify-center items-center gap-2">
                            <p class="text-center text-gray-800 font-medium text-base">
                                {{ $link->description ?: $link->url }}
                            </p>
                        </div>

                        <!-- ARROWS -->
                        <div class="flex flex-col items-center gap-1 ml-4">

                            <!-- UP -->
                            <button type="button"
                                    class="p-1.5 rounded-md text-gray-500 hover:text-blue-600 hover:bg-blue-50 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M5 15l7-7 7 7"/>
                                </svg>
                            </button>

                            <!-- DOWN -->
                            <button type="button"
                                    class="p-1.5 rounded-md text-gray-500 hover:text-blue-600 hover:bg-blue-50 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                        </div>
                    </div>
                </a>

            @empty
                <div class="bg-white border border-dashed border-gray-300 rounded-2xl min-h-24 flex items-center justify-center px-6 py-6">
                    <p class="text-gray-500 text-center">
                        No links found yet.
                    </p>
                </div>
            @endforelse
        </section>
    </div>
</x-layout>
