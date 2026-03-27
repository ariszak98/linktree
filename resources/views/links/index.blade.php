<x-layout>
    <div class="space-y-8">


        <!-- TOP SECTION -->
        <section class="bg-white border border-gray-200 rounded-sm p-6 shadow-sm">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                <x-buttons.link href="{{ route('links.create') }}">Add Link</x-buttons.link>

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


        <!-- HR -->
        <x-layout.style.hr />


        <!-- LINKS SECTION -->
        <section class="space-y-4">

            <x-buttons.link-wide href="{{ route('profile.edit') }}">Customise LinkTree</x-buttons.link-wide>

            @forelse($links as $link)

                <x-layout.style.card href="{{ route('links.edit', $link) }}">

                        @if($link->is_active)
                            <x-ui.pill-green>Active</x-ui.pill-green>
                        @else
                            <x-ui.pill-red>Inactive</x-ui.pill-red>
                        @endif

                        <x-text.card>{{ $link->description ?: $link->url }}</x-text.card>

                        <div class="flex flex-col items-center gap-1 ml-4">
                            <x-buttons.arrow-up/>
                            <x-buttons.arrow-down/>
                        </div>

                </x-layout.style.card>

            @empty
                <x-layout.style.empty-div>No links found yet.</x-layout.style.empty-div>
            @endforelse

        </section>


    </div>
</x-layout>
