<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <x-input-error :messages="$errors->get('email')" />

    <form method="POST" action="{{ route('user.activate') }}">
        @csrf
        <x-input-hidden id="email" name="email" :value="$email" />
        <x-input-hidden id="token" name="token" :value="$token" />


        <!-- Password -->
        <div class="input-div">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password"
                            type="password"
                            name="password"
                            required autofocus autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <x-primary-button>
            {{ __('ACTIVATE ACCOUNT') }}
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
