<x-layout>
    <div class="flex-1 flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">


            <x-text.h2>Login to your Account</x-text.h2>

            <form method="POST" action="/login">
                @csrf

                <div class="mb-4">
                    <x-forms.label for="username">Username</x-forms.label>
                    <x-forms.input id="username" name="username" required autofocus/>
                </div>

                <div class="mb-6">
                    <x-forms.label for="password">Password</x-forms.label>
                    <x-forms.input type="password" id="password" name="password" required/>
                </div>

                <x-buttons.submit-wide>Login</x-buttons.submit-wide>

            </form>

            <p class="mt-4 text-center text-gray-600">
                Don't have an account?
                <x-text.link href="/register">Sign up here.</x-text.link>
            </p>


        </div>
    </div>
</x-layout>
