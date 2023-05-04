<form method="POST" action="{{ route('user.store') }}">
    @csrf

    <!-- Name -->
    <div class="input-div">
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="input-div">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="email" />
        <x-input-error :messages="$errors->get('email')"/>
    </div>

    <!-- Email Address -->
    <div class="input-div">
        <x-input-label for="email" :value="__('Role')" />
        <select name="role">
            <option value="admin">Admin</option>
            <option value="docent">Docent</option>
            <option value="student">Student</option>
        </select>
        <x-input-error :messages="$errors->get('role')"/>
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-primary-button>
            {{ __('Register') }}
        </x-primary-button>
    </div>
</form>
