@props([
    "task",
])

<div class="card card-large card-task">
    <div class="announcement-title-active">
        <h3>{{ $task->name }}</h3>
    </div>
    <span>
        <hr>
        <div class="info-tasks announcement">
            <p>{{\Carbon\Carbon::create($task->deadline)->format("H:m") }} - {{\Carbon\Carbon::create($task->deadline)->format("d/m")}}</p>
            <p>{{$task->points}} punten</p>
        </div>
        <p class="announcement">
            {!! $task->description !!}
        </p>
    </span>
    <x-primary-button class="task-button">Indienen</x-primary-button>
</div>
