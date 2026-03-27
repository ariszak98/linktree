@props(['href'])


<a href="{{ $href }}" class="block group">
    <div class="bg-white border border-blue-100 rounded-sm shadow-sm hover:shadow-md transition flex items-center justify-between px-5 py-3 relative">

        {{ $slot }}

    </div>
</a>
