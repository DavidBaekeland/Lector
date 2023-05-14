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
        <div>
            <x-input-label for="password" :value="__('Wachtwoord')" />

            <x-text-input id="password"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" />
        </div>



        <div class="remember-password-div">
            <!-- Remember Me -->
            <div class="remember-div">
                <x-checkbox id="remember_me" name="remember" valueLabel="Onthoud mij"/>
            </div>

            <!-- Reset password -->
            @if (Route::has('password.request'))
                <a class="password-reset" href="{{ route('password.request') }}">
                    {{ __('Wachtwoord vergeten?') }}
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
