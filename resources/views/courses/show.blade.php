<x-app-layout>
    <x-card-small>
        <div class="chatTitle">
            <span>Cursussen</span>
        </div>

        <div class="chat-list" id="chats">
            @foreach($subjects as $subject)
                <a href="{{ route('courses.show', $subject->id) }}">{{$subject->name}}</a>
            @endforeach
        </div>
    </x-card-small>

    <x-card-large id="subject-card">
        @foreach($announcements as $announcement)
            <x-card-announcement x-data="{ open: false }" x-on:click="open = ! open">
                <div x-bind:class="open ? 'announcement-title-active' : 'announcement-title'">
                    <h3 >{{ $announcement->title }}</h3>
                    @if($announcement->created_at->format("d-m-Y") == now()->format("d-m-Y"))
                        {{$announcement->created_at->format("H:m")}}
                    @else
                        {{$announcement->created_at->format("d-m-Y")}}
                    @endif
                </div>
                <span x-show="open">
                    <hr>
                    <p class="announcement">
                        {!! $announcement->announcement !!}
                    </p>
                </span>
            </x-card-announcement>
        @endforeach
    </x-card-large>
</x-app-layout>
