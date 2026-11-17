<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="" />
            <x-input-error :messages="$errors->get('email')" class="" />
        </div>

        <!-- Password -->
        <div class="">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class=""
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="" />
        </div>

        <!-- Remember Me -->
        <div class="">
            <label for="remember_me" class="">
                <input id="remember_me" type="checkbox" class="">
                <span class="">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="">
            @if (Route::has('password.request'))
                <a class="">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
