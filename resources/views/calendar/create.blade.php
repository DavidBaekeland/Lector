<x-app-layout>

    <x-card class="modal">
        <form method="POST" action="{{ route('calendar.store') }}">
            @csrf

            <div class="input-div">
                <x-text-input id="title" type="text" name="title" :value="old('title')" placeholder="Titel" required autofocus />
                <x-input-error :messages="$errors->get('title')"/>
            </div>

            <div class="input-div">
                <x-text-input id="last_name" type="text" name="last_name" :value="old('last_name')" placeholder="Achternaam" required />
                <x-input-error :messages="$errors->get('last_name')"/>
            </div>

            <div class="input-div">
                <x-text-input id="location" type="text" name="location" :value="old('location')" placeholder="Locatie" required />
                <x-input-error :messages="$errors->get('location')"/>
            </div>

            <div class="dates-div">
                <x-text-input id="startDate" class="dateInput" type="date" name="startDate" :value="old('startDate')" required />
                <x-text-input id="startTime" class="timeInput" type="time" name="startTime" :value="old('startTime')" required />
                <x-input-error :messages="$errors->get('dateInput')"/>
                <x-input-error :messages="$errors->get('timeStart')"/>
            </div>
            <div class="dates-div">
                <x-text-input id="endDate" class="dateInput" type="date" name="endDate" :value="old('endDate')" required />
                <x-text-input id="endTime" class="timeInput" type="time" name="endTime" :value="old('endTime')" required />
                <x-input-error :messages="$errors->get('dateInput')"/>
                <x-input-error :messages="$errors->get('timeStart')"/>
            </div>

            <x-primary-button>
                {{ __('OPSLAAN') }}
            </x-primary-button>
        </form>
    </x-card>

    @vite(['resources/css/calendar.css', 'resources/js/calendar.js'])
</x-app-layout>
