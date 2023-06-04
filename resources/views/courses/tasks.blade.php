<x-app-layout>
    <x-card-small>
        <div class="card-small-title">
            <span>Cursussen</span>
        </div>

        <div class="card-small-list">
            @foreach($subjects as $subject)
                <a href="{{ route('courses.show', $subject->id) }}" @class([
                    "card-small-item",
                    "card-small-item-selected" => $selectedSubject->id == $subject->id
                ])>
                    {{$subject->name}}
                </a>
            @endforeach
        </div>
    </x-card-small>

    <x-card-large id="subject-card" x-data="{ open: false }">
        <div id="headerSubject">
            @can("manage_tasks")
                <button x-on:click="open = ! open" class="link-add">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </button>
            @else
                <span></span>
            @endcan

            <h3 id="titleSubject">{{ $selectedSubject->name }}</h3>

            <x-nav-subject :selectedSubject="$selectedSubject" />
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/progressbar.js/0.6.1/progressbar.js" integrity="sha512-31I8S0k9PCZb3or2whlgM88rgY9mvkSXTxIQMXMkc8N79b29nKc+MN8qVVJT0vE5D8uy1sVuNWrkAt6zEh+PZg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <div id="tasks">
            @foreach($selectedSubject->tasks as $task)
                <x-card-task :task="$task" />
            @endforeach
        </div>

        @can("manage_tasks")
            <dialog class="card dialog-task" x-bind:open="open">
                <form action="{{ route('courses.tasks.store', $selectedSubject->id) }}" method="POST">
                    @csrf

                    <div class="input-div">
                        <x-text-input type="text" name="name" :value="old('name')" placeholder="Naam" required autofocus autocomple="off" />
                        <x-input-error :messages="$errors->get('name')"/>
                    </div>

                    <div class="input-div">
                        <x-text-input type="number" name="points" :value="old('points')" placeholder="Punten" required autocomple="off" />
                        <x-input-error :messages="$errors->get('points')"/>
                    </div>

                    <div class="input-div">
                        <x-input-textarea name="description" maxlength="1000" required placeholder="Beschrijving"></x-input-textarea>
                        <x-input-error :messages="$errors->get('description')"/>
                    </div>

                    <div class="dates-div">
                        <x-text-input id="deadlineDate" class="dateInput" type="date" name="deadlineDate" :value="old('deadlineDate')" required autocomple="off"/>
                        <x-text-input id="deadlineTime" class="timeInput" type="time" name="deadlineTime" :value="old('deadlineTime')" required autocomple="off"/>
                        <x-input-error :messages="$errors->get('deadlineDate')"/>
                        <x-input-error :messages="$errors->get('deadlineTime')"/>
                    </div>

                    <x-primary-button>Opslaan</x-primary-button>
                </form>
            </dialog>
        @endcan
    </x-card-large>
</x-app-layout>
