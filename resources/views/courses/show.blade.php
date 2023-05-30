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

    <x-card-large>
        @foreach($selectedSubject->announcements as $announcement)
            <x-card-announcement x-data="{ open: false }" x-on:click="open = ! open">
                <h3  x-bind:class="open ? 'announcement-title-active' : 'announcement-title'">{{ $announcement->title }}</h3>
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
