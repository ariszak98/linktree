<x-layout>
    <div class="flex-1 flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">


            <x-text.h2>Register a new Account</x-text.h2>

            <form method="POST" action="/register">
                @csrf

                <div class="mb-4">
                    <x-forms.label for="username">Username</x-forms.label>
                    <x-forms.input id="username" name="username" type="text"
                                   required value="{{ old('username') }}"
                    />
                </div>

                <div class="mb-4">
                    <x-forms.label for="email">Email Address</x-forms.label>
                    <x-forms.input id="email" name="email" type="email"
                                   required value="{{ old('email') }}"
                    />
                </div>

                <div class="mb-4">
                    <x-forms.label for="email_confirmation">Email Confirmation</x-forms.label>
                    <x-forms.input id="email_confirmation" name="email_confirmation" type="email"
                                   required value="{{ old('email_confirmation') }}"
                    />
                </div>

                <div class="mb-6">
                    <x-forms.label for="password">Password</x-forms.label>
                    <x-forms.input id="password" name="password" type="password"
                                   required
                    />
                </div>

                <x-buttons.submit-wide>Sign up</x-buttons.submit-wide>

            </form>

            <p class="mt-4 text-center text-gray-600">
                Already have an account?
                <x-text.link href="/login">Login here.</x-text.link>
            </p>


            @foreach($errors->all() as $error)
                <li class="text-red-500 text-sm mt-2">{{ $error }}</li>
            @endforeach


        </div>
    </div>
</x-layout>
