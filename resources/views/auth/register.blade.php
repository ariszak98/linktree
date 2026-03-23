<x-layout>
    <div class="flex-1 flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Register a new Account</h2>
            <form method="POST" action="/register">
                @csrf
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 mb-2">Username</label>
                    <input type="text" id="username" name="username" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                           value="{{ old('username') }}">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 mb-2">Email Address</label>
                    <input type="email" id="email" name="email" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                           value="{{ old('email') }}">
                </div>
                <div class="mb-4">
                    <label for="email_confirmation" class="block text-gray-700 mb-2">Email Confirmation</label>
                    <input type="email" id="email_confirmation" name="email_confirmation" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 mb-2">Password</label>
                    <input type="password" id="password" name="password" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                    Sign up
                </button>
            </form>
            <p class="mt-4 text-center text-gray-600">
                Already have an account?
                <a href="/login" class="text-blue-600 hover:underline">Login here</a>.
            </p>


            @foreach($errors->all() as $error)
                <li class="text-red-500 text-sm mt-2">{{ $error }}</li>
            @endforeach


        </div>
    </div>
</x-layout>
