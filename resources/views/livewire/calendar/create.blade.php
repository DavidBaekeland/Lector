<x-card class="modal" id="calendar-modal">
    @can('manage_subjects')
        <div id="appointmentsToggle">
            <span>Persoonlijk</span>
                <div id="subjectCheckboxDiv">
                    <input type="checkbox" wire:model="subjectCheckbox" id="subjectCheckbox">
                    <span id="slider" wire:click="changeSubjectCheckbox"></span>
                </div>
            <span>Cursus</span>
        </div>
    @endcan

    @if($subjectCheckbox && Auth::user()->can('manage_subjects'))
        <form method="POST" wire:submit.prevent="submitCourseAppointment">
            @csrf

            <div class="input-div">
                <select wire:model="subjectId" class="role-input">
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">
                            {{$subject->name}}
                        </option>
                    @endforeach

                </select>

                <x-input-error :messages="$errors->get('subject')"/>
            </div>
        @else
        <form method="POST" wire:submit.prevent="submitPersonalAppointment">
            @csrf
            <div class="input-div">
                <x-text-input id="title" type="text" wire:model="name" name="title" :value="old('title')" placeholder="Titel" required autofocus autocomple="off" />
                <x-input-error :messages="$errors->get('name')"/>
            </div>

            <div class="input-div">
                <div class="selectedUsers">
                    <span>
                        @if($selectedUsers)
                            @foreach($selectedUsers as $selectedUser)
                                <a class="card-small-item card-small-item-selected">{{\App\Models\User::find($selectedUser)->name}}</a>
                            @endforeach
                        @endif
                    </span>

                    <input type="text" wire:model="user"  name="userInput"  autocomplete="off">

                </div>

                <x-input-error :messages="$errors->get('user')"/>


                <div id="showUsersDiv">
                    @if($choiceUsers)
                        @foreach($choiceUsers as $user)
                            <a wire:click="selectUser({{ $user->id}})">
                                {{$user->name}}
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
        @endif



        <div class="input-div">
            <x-text-input id="location" wire:model="location" type="text" name="location" :value="old('location')" placeholder="Locatie" required autocomple="off"/>
            <x-input-error :messages="$errors->get('location')"/>
        </div>

        <div class="dates-div">
            <x-text-input id="startDate" wire:model="startDate" class="dateInput" type="date" name="startDate" :value="old('startDate')" required autocomple="off"/>
            <x-text-input id="startTime" wire:model="startTime" class="timeInput" type="time" name="startTime" :value="old('startTime')" required autocomple="off"/>
            <x-input-error :messages="$errors->get('dateInput')"/>
            <x-input-error :messages="$errors->get('timeStart')"/>
        </div>

        <div class="dates-div">
            <x-text-input id="endDate" wire:model="endDate" class="dateInput" type="date" name="endDate" :value="old('endDate')" required autocomple="off"/>
            <x-text-input id="endTime" wire:model="endTime"  class="timeInput" type="time" name="endTime" :value="old('endTime')" required autocomple="off"/>
            <x-input-error :messages="$errors->get('dateInput')"/>
            <x-input-error :messages="$errors->get('timeStart')"/>
        </div>

        <x-primary-button>
            {{ __('OPSLAAN') }}
        </x-primary-button>
    </form>
</x-card>

@vite(['resources/css/calendar.css', 'resources/js/calendar.js'])
