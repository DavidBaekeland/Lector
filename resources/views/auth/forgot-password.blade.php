<x-guest-layout>
    <div class="input-div">
        {{ __('Wachtwoord vergeten? Geen probleem. Laat ons je e-mailadres weten en we sturen je een link om je wachtwoord opnieuw in te stellen, waarmee je een nieuwe kunt kiezen.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="input-div">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <x-primary-button>
            {{ __('EMAIL RESET LINK') }}
        </x-primary-button>
    </form>

    <style>
        .text-input[type="email"] {
            background: url({{ asset('storage/icons/email.svg') }}) no-repeat;
            background-size: 20px;
            background-position: 10px center;
        }
    </style>
</x-guest-layout>
