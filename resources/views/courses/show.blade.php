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
            <x-card-announcement :announcement="$announcement" />
        @endforeach
    </x-card-large>
</x-app-layout>
