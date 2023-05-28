<x-app-layout>
    <div id="dashboard">
        <span class="dashboard-settings">
            <a class="dashboard-settings-link">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                </svg>
            </a>
        </span>

        <div class="cardsDashboard">
            <div class="row">
                <x-card-dashboard class="info2">
                    QDSFQSDF
                </x-card-dashboard>
                <x-card-dashboard class="info2">
                    QDSFQSDF
                </x-card-dashboard>
            </div>

            <div class="row">
                <x-card-dashboard class="info">
                    <h2>CHAT</h2>
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
                <x-card-dashboard class="info">
                    QDSFQSDF
                </x-card-dashboard>
                <x-card-dashboard class="info">
                    <h2>AGENDA</h2>
                    @if(count($datesAppointments) > 0)
                        @foreach($datesAppointments as $appointment)
                            <a href="{{ route('calendar.index') }}" class="chat-dashboard">
                                @if(\Carbon\Carbon::today() == $appointment->start_date)
                                    <span class="timeLocationDashboard">{{\Carbon\Carbon::parse($appointment->start_time)->format('H:m')}}</span>
                                @else
                                    <span class="timeLocationDashboard">{{\Carbon\Carbon::parse($appointment->start_date)->format('d-m')}}</span>
                                @endif
                                <span>{{$appointment->title}}</span>
                                <span class="timeLocationDashboard">{{$appointment->location}}</span>
                            </a>
                        @endforeach
                    @else
                        Sorry, er zijn geen afspraken beschikbaar.
                    @endif

                </x-card-dashboard>
            </div>
        </div>
    </div>

</x-app-layout>
