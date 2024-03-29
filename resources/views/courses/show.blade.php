<x-app-layout>
    <x-card-small class="mobile">
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
            <span class="desktopHeaderSubject">
                @can("manage_subjects")
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

            </span>

            <span class="mobileHeaderSubject">
                <span>
                    <a id="course-back" href="{{ route('courses.index') }}" class="videoLink backLinkCourse">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="0.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </a>

                <h3 id="titleSubject">{{ $selectedSubject->name }}</h3>

                @can("manage_subjects")
                        <button x-on:click="open = ! open" class="link-add link-add-mobile">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                    @endcan
                </span>

                <x-nav-subject :selectedSubject="$selectedSubject" />
            </span>


        </div>

        <div>
            @foreach($announcements as $announcement)
                @if(isset($selectedAnnouncement) && $announcement->id == $selectedAnnouncement)
                    <x-card-announcement :announcement="$announcement" open />
                @elseif(!isset($selectedAnnouncement) && $loop->first)
                    <x-card-announcement :announcement="$announcement" open />
                @else
                    <x-card-announcement :announcement="$announcement" />
                @endif
            @endforeach
        </div>
        @can("manage_subjects")
            <dialog class="card dialog-document" x-bind:open="open" id="dialog-document">
                <form action="{{ route("courses.announcement.store", $selectedSubject->id) }}" method="POST">
                    @csrf
                    <a x-on:click="open = !open" class="link-close">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </a>

                    <div class="input-div">
                        <x-text-input type="text" name="title" id="title" :value="old('title')" placeholder="Titel" required autofocus autocomple="off" />
                        <x-input-error :messages="$errors->get('title')"/>
                    </div>

                    <div class="input-div">
                        <x-input-textarea name="announcement" maxlength="1000" required :value="old('announcement')" placeholder="Aankondiging"></x-input-textarea>
                        <x-input-error :messages="$errors->get('announcement')"/>
                    </div>

                    <x-secondary-button>Opslaan</x-secondary-button>
                </form>
            </dialog>
        @endcan

        <script>
            window.addEventListener('resize', () => resize);

            function resize() {
                if (window.innerWidth <= 600)
                {
                    document.getElementById("chat-back").style.display = "block"
                    document.getElementById("chat-card").style.display = "none"
                }
            }

            resize()
        </script>
    </x-card-large>
</x-app-layout>
