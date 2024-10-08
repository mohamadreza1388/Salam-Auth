<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <x-authentication-card-logo/>

    <h1 class="text-black mt-1.5 font-bold text-[26px]">خوش اومدی</h1>

    <form method="POST" action="{{ route('login') }}" class="w-full">
        @csrf
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                          autofocus autocomplete="username"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')"/>

            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="current-password"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                       class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                       name="remember">
                <span class="text-gray-600 cursor-pointer font-bold mr-2">{{ __('Remember me') }}</span>
            </label>
        </div>

        @if (Route::has('password.request'))
            <a class="text-[#276EF6] font-bold block" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif

        <a class="text-[#276EF6] font-bold block mt-1" href="{{ route('register') }}">
            {{ __('حساب کاربری ندارید؟') }}
        </a>

        <x-button-auth>
            {{ __('Log in') }}
        </x-button-auth>
    </form>
</x-guest-layout>
