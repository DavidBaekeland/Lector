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

        <div>

        </div>
    </x-card-large>
</x-app-layout>
