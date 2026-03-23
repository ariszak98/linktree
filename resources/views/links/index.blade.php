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
                        Active links:
                        <span class="font-bold text-blue-600">
                            {{ $activeLinksCount ?? 0 }}
                        </span>
                    </p>

                    <p class="text-gray-700">
                        Non-active links:
                        <span class="font-bold text-blue-600">
                            {{ $inactiveLinksCount ?? 0 }}
                        </span>
                    </p>
                </div>
            </div>
        </section>

        <hr class="border-gray-200">

        <!-- LINKS SECTION -->
        <section class="space-y-4">
            @forelse($links as $link)
            <div class="bg-white border border-blue-100 rounded-sm shadow-sm hover:shadow-md transition flex items-center justify-between px-5 py-3">

                <!-- CENTER TEXT -->
                <div class="flex-1 flex justify-center">
                    <p class="text-center text-gray-800 font-medium text-base">
                        {{ $link->description ?: $link->url }}
                    </p>
                </div>

                <!-- ARROWS -->
                <div class="flex flex-col items-center gap-1 ml-4">

                    <!-- UP -->
                    <button
                        class="p-1.5 rounded-md text-gray-500 hover:text-blue-600 hover:bg-blue-50 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 15l7-7 7 7"/>
                        </svg>
                    </button>

                    <!-- DOWN -->
                    <button
                        class="p-1.5 rounded-md text-gray-500 hover:text-blue-600 hover:bg-blue-50 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                </div>
            </div>

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
