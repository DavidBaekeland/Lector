<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="input-div">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')"/>
        </div>

        <!-- Password -->
        <div class="input-div">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" />
        </div>



        <div class="flex">
            <!-- Remember Me -->
            <div class="remember-div">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <!-- Reset password -->
            @if (Route::has('password.request'))
                <a class="password-reset" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

        </div>


        <x-primary-button>
            {{ __('LOGIN') }}
        </x-primary-button>
    </form>

    <style>
        .text-input[type="email"] {
            background: url({{ asset('storage/icons/email.svg') }}) no-repeat;
            background-size: 20px;
            background-position: 10px center;
        }

        .text-input[type="password"] {
            background: url({{ asset('storage/icons/password.svg') }}) no-repeat;
            background-size: 20px;
            background-position: 10px center;
        }

        .text-input[type="email"]:focus {
            background: url({{ asset('storage/icons/selected/email.svg') }}) no-repeat;
            background-size: 20px;
            background-position: 10px center;
        }

        .text-input[type="password"]:focus {
            background: url({{ asset('storage/icons/selected/password.svg') }}) no-repeat;
            background-size: 20px;
            background-position: 10px center;
        }
    </style>
</x-guest-layout>
