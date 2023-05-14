<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <input type="hidden" name="email" id="email" value="{{ $request->route('email') }}">

        <x-input-error :messages="$errors->get('email')" />

        <!-- Password -->
        <div class="input-div">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" type="password" name="password" required autofocus autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <!-- Confirm Password -->
        <div class="input-div">
            <x-input-label for="password_confirmation" :value="__('Bevestig Wachtwoord')" />

            <x-text-input id="password_confirmation"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" />
        </div>

        <x-primary-button>
            {{ __('RESET WACHTWOORD') }}
        </x-primary-button>
    </form>

    <style>
        .text-input[type="password"] {
            background: url({{ asset('storage/icons/password.svg') }}) no-repeat;
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
