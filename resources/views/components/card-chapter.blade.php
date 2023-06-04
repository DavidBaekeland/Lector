@props([
    "chapter",
    "slug"
])

<div class="card card-large card-task" x-data="{ open: false }">
    <div class="announcement-title-active">
        <h3>{{ $chapter->title }}</h3>
{{--        @if(auth()->user()->can('manage_tasks'))--}}
{{--            <a href="{{ route('courses.tasks.check', ["slug" => $task->subject_id, "task" => $task]) }}">--}}
{{--                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="task-icon">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />--}}
{{--                </svg>--}}
{{--            </a>--}}
{{--        @elseif(auth()->user()->can('upload_task', $task))--}}
{{--            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="task-icon">--}}
{{--                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />--}}
{{--            </svg>--}}
{{--        @elseif($task->deadline < now() && !auth()->user()->hasTask($task->id))--}}
{{--            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="task-icon">--}}
{{--                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />--}}
{{--            </svg>--}}
{{--        @endif--}}
    </div>
    <span>
        <hr>

        @foreach($chapter->documents as $document)
            <form action="{{ route("courses.documents.download", $slug) }}" method="post">
                @csrf
                <input name="file_name" type="hidden" value="{{"chapters/$chapter->id/$document->file_name"}}">

                <span class="download-document-span announcement">
                    {{$document->file_name}}
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>
                    </button>
                </span>
            </form>
        @endforeach

    </span>
</div>
