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
{{--        <dialog open class="card dialog-task">--}}
{{--            @foreach()--}}
{{--                --}}
{{--            @endforeach--}}
{{--        </dialog>--}}
        @foreach($tasks as $key => $pivots)
            <x-card-small class="uploaded-task-card">
                <div>
                    <h3>{{ $key }}</h3>
                    @foreach($pivots as $pivot)
                        <form action="{{ route("courses.tasks.download", $slug) }}" method="post">
                            @csrf
                            <input name="file_name" type="hidden" value="{{"tasks/$pivot->task_id/$pivot->user_id/$pivot->file_name"}}">

                            <span class="download-tasks-span">
                            {{$pivot->file_name}}
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                </svg>
                            </button>
                        </span>
                        </form>
                    @endforeach
                </div>
                <div class="uploaded-task-card-grade-form">
                    <p>Max score: {{$task->points}}</p>
                    @if($pivot->points != null)
                        <p>Score: {{$pivot->points}}/{{$task->points}}</p>
                    @else
                        <p>Score: nog <b>NIET</b> beoordeeld</p>
                    @endif
                    <form action="{{ route("courses.tasks.grade", ["slug" => $slug, "task" => $pivot->task_id]) }}" method="POST">
                        @csrf

                        <input name="user_id" type="hidden" value="{{"$pivot->user_id"}}">
                        <x-text-input id="points" type="number" name="points" :value="old('points')" required />
                        <x-input-error :messages="$errors->get('points')" />
                        <x-secondary-button>
                            {{ __('Opslaan') }}
                        </x-secondary-button>
                    </form>
                </div>
            </x-card-small>
        @endforeach
    </x-card-large>
</x-app-layout>
