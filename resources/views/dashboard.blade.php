<x-app-layout>

    <div id="dashboard" x-data="{ open: false }">
        <span class="dashboard-settings">
            <a class="dashboard-settings-link" x-on:click="open = ! open">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                </svg>
            </a>
        </span>
        <dialog class="card dialog-document" x-bind:open="open">
            <a x-on:click="open = !open" class="link-close">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a>
            <form action="{{ route('dashboard.cards.update') }}" method="post">
                @csrf

                @foreach(\App\Models\Dashboard::all() as $dashboardCard)
                    @switch($dashboardCard->title)
                        @case("Punten")
                            @if(auth()->user()->can("see_points"))
                                <x-checkbox class="chekcboxDashboard" id="{{$dashboardCard->title}}Dashboard" name="dashboard[{{$dashboardCard->id}}]" valueLabel="{{$dashboardCard->title}}" :checked="auth()->user()->hasDashboard($dashboardCard->id)"/>
                            @endif

                            @break
                        @case("Deadlines")
                            @if(auth()->user()->can("see_deadlines"))
                                <x-checkbox class="chekcboxDashboard" id="{{$dashboardCard->title}}Dashboard" name="dashboard[{{$dashboardCard->id}}]" valueLabel="{{$dashboardCard->title}}" :checked="auth()->user()->hasDashboard($dashboardCard->id)"/>
                            @endif
                            @break

                        @default
                            <x-checkbox class="chekcboxDashboard" id="{{$dashboardCard->title}}Dashboard" name="dashboard[{{$dashboardCard->id}}]" valueLabel="{{$dashboardCard->title}}" :checked="auth()->user()->hasDashboard($dashboardCard->id)"/>
                    @endswitch
                @endforeach
                <!-- <x-checkbox id="announcementDashboard" name="announcementDashboard" valueLabel="Aankondigingen"/>
                <x-checkbox id="pointsDashboard" name="pointsDashboard" valueLabel="Punten"/>
                <x-checkbox id="chatDashboard" name="chatDashboard" valueLabel="Chat"/>
                <x-checkbox id="deadlinesDashboard" name="deadlinesDashboard" valueLabel="Deadlines"/>
                <x-checkbox id="calendarDashboard" name="calendarDashboard" valueLabel="Agenda"/> -->

                <x-primary-button>
                    OPSLAAN
                </x-primary-button>
            </form>
        </dialog>

        <div class="cardsDashboard">
            <div class="row">
                @if(auth()->user()->hasDashboardTitle("Aankondigingen"))
                    <x-card-dashboard class="info2">
                        <h2>AANKONDIGINGEN</h2>
                        @if(count($announcements) > 0)
                            @foreach($announcements as $announcement)
                                <a href="{{ route('courses.show', [$announcement->subject_id, $announcement->id]) }}" class="chat-dashboard">
                                    {{$announcement->title}}
                                </a>
                            @endforeach
                        @else
                            Sorry, er zijn geen aankondigingen beschikbaar.
                        @endif
                    </x-card-dashboard>
                @endif

                @if(auth()->user()->can("see_points") && auth()->user()->hasDashboardTitle("Punten"))
                    <x-card-dashboard class="info2">
                        <h2>PUNTEN</h2>
                        <div id="pointsDiv">
                            @foreach($subjectPoints as $key => $subjectPoint)
                                <div class="pointsSubject">
                                    <div id="points-{{ $loop->index }}" class="points">

                                    </div>
                                    <p @class([
                                    "subject-name",
                                    "subject-name-passed" => $subjectPoint >= 0.5
                                ])>{{$key}}</p>
                                </div>
                            @endforeach
                        </div>
                    </x-card-dashboard>
                @endif
            </div>

            <div class="row">
                @if(auth()->user()->hasDashboardTitle("Chats"))
                    <x-card-dashboard class="info">
                        <h2>CHATS</h2>
                        @if(count($chats) > 0)
                            @foreach($chats as $chat)
                                <a href="{{ route('chat') }}" class="chat-dashboard">
                                    {{$chat->name}}
                                </a>
                            @endforeach
                        @else
                            Sorry, er zijn geen chats beschikbaar.
                        @endif
                    </x-card-dashboard>
                @endif

                @if(auth()->user()->can("see_deadlines") && auth()->user()->hasDashboardTitle("Deadlines"))
                    <x-card-dashboard class="info2">
                        <h2>DEADLINES</h2>
                        @if(count($deadlines) > 0)
                            @foreach($deadlines as $deadline)
                                <x-dashboard-deadline :deadline="$deadline"></x-dashboard-deadline>
                            @endforeach
                        @else
                            Sorry, er zijn geen deadlines beschikbaar.
                        @endif
                    </x-card-dashboard>
                @endif

                @if(auth()->user()->hasDashboardTitle("Agenda"))
                    <x-card-dashboard class="info">
                        <h2>AGENDA</h2>
                        @if(count($datesAppointments) > 0)
                            @foreach($datesAppointments as $appointment)
                                <a href="{{ route('calendar.index') }}" class="chat-dashboard">
                                    @if(\Carbon\Carbon::today() == $appointment->start_date)
                                        <span class="timeLocationDashboard">{{\Carbon\Carbon::parse($appointment->start_time)->format('H:m')}}</span>
                                    @else
                                        <span class="timeLocationDashboard">{{\Carbon\Carbon::parse($appointment->start_date)->format('d/m')}}</span>
                                    @endif
                                    <span>{{$appointment->title}}</span>
                                    <span class="timeLocationDashboard">{{$appointment->location}}</span>
                                </a>
                            @endforeach
                        @else
                            Sorry, er zijn geen afspraken beschikbaar.
                        @endif

                    </x-card-dashboard>
                @endif
            </div>
        </div>
    </div>

    @can('see_points')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/progressbar.js/0.6.1/progressbar.js" integrity="sha512-31I8S0k9PCZb3or2whlgM88rgY9mvkSXTxIQMXMkc8N79b29nKc+MN8qVVJT0vE5D8uy1sVuNWrkAt6zEh+PZg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            @foreach($subjectPoints as $key => $subjectPoint)
                @php
                $color = ($subjectPoint >= 0.5)
                            ? '#5DCD70'
                            : '#E84E4E';
                @endphp

                let bar{{ $loop->index }} = new ProgressBar.Circle('#points-{{$loop->index}}', {
                    color: @json($color),
                    strokeWidth: 12,
                    trailWidth: 1,
                    easing: 'easeInOut',
                    duration: 1400,
                    text: {
                    autoStyleContainer: false
                },
                    from: { color: '#E84E4E', width: 12 },
                    to: { color: '@json($color)', width: 12 },
                    step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    // var value = Math.round(circle.value() * 100);
                    // if (value === 0) {
                    //     circle.setText('');
                    // } else {
                    //     circle.setText(value);
                    // }
                }
                });
                // bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
                // bar.text.style.fontSize = '2rem';

            bar{{ $loop->index }}.animate(@json($subjectPoint));
            @endforeach
        </script>
    @endcan
</x-app-layout>
