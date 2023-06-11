@props([
    "chapter",
    "slug"
])

<div class="card card-large card-task" x-data="{ open: false }">
    <div class="announcement-title-active">
        <h3>{{ $chapter->title }}</h3>
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
