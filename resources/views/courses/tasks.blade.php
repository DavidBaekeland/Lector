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

    <x-card-large id="subject-card">
        <div id="headerSubject">
            <span></span>

            <h3 id="titleSubject">{{ $selectedSubject->name }}</h3>

            <x-nav-subject :selectedSubject="$selectedSubject" />
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/progressbar.js/0.6.1/progressbar.js" integrity="sha512-31I8S0k9PCZb3or2whlgM88rgY9mvkSXTxIQMXMkc8N79b29nKc+MN8qVVJT0vE5D8uy1sVuNWrkAt6zEh+PZg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <div id="tasks">
            @foreach($selectedSubject->tasks as $task)
                <x-card-task :task="$task" />
            @endforeach
        </div>
    </x-card-large>
</x-app-layout>
