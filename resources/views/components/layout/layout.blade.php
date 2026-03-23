<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Linktree') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-800 min-h-screen flex flex-col">

<!-- NAVBAR -->
<nav x-data="{ open: false }" class="border-b border-gray-200 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <!-- Logo -->
            <div class="flex items-center">
                <a href="/" class="text-xl font-bold text-blue-600">
                    Linktree
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-6">


{{--                <a href="#" class="text-gray-600 hover:text-blue-600 transition">--}}
{{--                    Features--}}
{{--                </a>--}}


                @auth
                    <a href="#" class="text-gray-600 hover:text-blue-600 transition">
                        <label class="font-medium">{{ auth()->user()->username }}, </label>
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-blue-600">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="/login" class="text-gray-600 hover:text-blue-600 transition">
                        Login
                    </a>
                    <a href="/register"
                       class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                        Sign up
                    </a>
                @endauth
            </div>

            <!-- Mobile Button -->
            <button @click="open = !open" class="md:hidden text-gray-600 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open"
         x-transition
         @click.outside="open = false"
         class="md:hidden px-4 pb-4 space-y-3">



        <br>
{{--        <a href="#" class="block text-gray-600 hover:text-blue-600">--}}
{{--            Features--}}
{{--        </a>--}}
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-gray-600 hover:text-blue-600">
                    Logout
                </button>
            </form>
        @else
            <a href="/login" class="block text-gray-600 hover:text-blue-600">
                Login
            </a>
            <a href="/register"
               class="block bg-blue-600 text-white px-4 py-2 rounded-lg text-center">
                Sign up
            </a>
        @endauth
    </div>
</nav>




<!-- MAIN CONTENT -->
<main class="flex-1 flex">
    <div class="flex-1 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex flex-col">
        {{ $slot ?? '' }}
        @yield('content')
    </div>
</main>




<!-- FOOTER -->
<footer class="border-t border-gray-200 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex flex-col md:flex-row justify-between items-center gap-3">

        <p class="text-sm text-gray-500">
            © {{ date('Y') }} Linktree Clone. All rights reserved.
        </p>

        <div class="flex gap-4 text-sm">
            <a href="#" class="text-gray-500 hover:text-blue-600 transition">
                Privacy
            </a>
            <a href="#" class="text-gray-500 hover:text-blue-600 transition">
                Terms
            </a>
            <a href="#" class="text-gray-500 hover:text-blue-600 transition">
                Contact
            </a>
        </div>
    </div>
</footer>

</body>
</html>
