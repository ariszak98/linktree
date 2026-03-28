<x-layout :showHeader="false">
    <div class="w-full max-w-2xl mx-auto py-10">

        <!-- PROFILE HEADER -->
        <section class="flex flex-col items-center text-center">
            <div class="w-38 h-38 rounded-full overflow-hidden border-4 border-white shadow-md bg-gray-100">
                @if($user->profile?->avatar)
                    <img
                        src="{{ asset('storage/' . $user->profile->avatar) }}"
                        alt="{{ $user->username }} avatar"
                        class="w-full h-full object-cover"
                    >
                @else
                    <div class="w-full h-full flex items-center justify-center text-3xl font-bold text-gray-400">
                        {{ strtoupper(substr($user->username, 0, 1)) }}
                    </div>
                @endif
            </div>

            <h1 class="mt-5 text-2xl sm:text-3xl font-bold text-gray-900">
                {{ '@' . $user->username }}
            </h1>

            @if($user->profile?->description)
                <p class="mt-3 text-gray-600 max-w-md leading-relaxed">
                    {{ $user->profile->description }}
                </p>
            @endif
        </section>

        <!-- LINKS -->
        <section class="mt-10 space-y-4">
            @forelse($links as $link)
                <a
                    href="{{ $link->url }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="flex items-center justify-center gap-2 w-full rounded-lg border-2 border-dashed border-black bg-white px-6 py-5 font-medium text-gray-800 shadow-sm transition hover:-translate-y-1 hover:shadow-lg hover:text-blue-600">

                    @if($link->social)
                        <x-dynamic-component :component="'icons.' . $link->social . '-svg'" />
                    @endif

                    <span>
                        {{ $link->description ?: $link->url }}
                    </span>
                </a>
            @empty
                <div class="rounded-2xl border border-dashed border-gray-300 bg-gray-50 px-6 py-8 text-center text-gray-500">
                    No links available yet.
                </div>
            @endforelse
        </section>

    </div>
</x-layout>
