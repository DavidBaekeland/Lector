<x-app-layout>
    <x-card-large>

        <div id="appointmentCreateDiv">
            <a href="{{ route('calendar.store') }}" id="appointmentCreate">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                </svg>
            </a>
        </div>
        <div id="calendar">
            <div class="dates">
                <h1> </h1>
                <h1>Ma - {{ $now->startOfWeek()->format('d-m') }}</h1>
                <h1>Di - {{ $now->startOfWeek()->addDay()->format('d-m') }}</h1>
                <h1>Wo - {{ $now->startOfWeek()->addDays(2)->format('d-m') }}</h1>
                <h1>Do - {{ $now->startOfWeek()->addDays(3)->format('d-m') }}</h1>
                <h1>Vr - {{ $now->startOfWeek()->addDays(4)->format('d-m') }}</h1>
            </div>
            <div class="calendar">
                <div class="time">
                    <p class="calendar-time">09:00</p>
                    <p class="calendar-time">10:00</p>
                    <p class="calendar-time">11:00</p>
                    <p class="calendar-time">12:00</p>
                    <p class="calendar-time">13:00</p>
                    <p class="calendar-time">14:00</p>
                    <p class="calendar-time">15:00</p>
                    <p class="calendar-time">16:00</p>
                    <p class="calendar-time">17:00</p>
                    <p class="calendar-time">18:00</p>
                    <p class="calendar-time">19:00</p>
                    <p class="calendar-time">20:00</p>
                </div>
                <div class="days">
                    <div class="day" id="{{$now->startOfWeek()->format('d-m')}}">
{{--                        @dump($appointmentsDates)--}}
                        @foreach($appointmentsDates as $key => $appointmentsDate)
                            @if($key == $now->startOfWeek()->format('Y-m-d'))
                                @if(isset($appointmentsDate["09:00"]))
                                    <div class="active-calendar personal-calendar calendar-1">
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["09:00"]->title}}</h2>
                                            <span>{{$appointmentsDate["09:00"]->location}}</span>
                                        </span>
                                    </div>
                                @else
                                    <div class="calendar-item"></div>
                                @endif

                                @if(isset($appointmentsDate["10:00"]))
                                    <div class="active-calendar personal-calendar calendar-1">
                                    <span class="info-active">
                                        <h2>{{$appointmentsDate["10:00"]->title}}</h2>
                                        <span>{{$appointmentsDate["10:00"]->location}}</span>
                                    </span>
                                    </div>
                                @else
                                    <div class="calendar-item"></div>
                                @endif

                                @if(isset($appointmentsDate["11:00"]))
                                    <div class="active-calendar personal-calendar calendar-1">
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["11:00"]->title}}</h2>
                                            <span>{{$appointmentsDate["11:00"]->location}}</span>
                                        </span>
                                    </div>
                                @else
                                    <div class="calendar-item"></div>
                                @endif

                                @if(isset($appointmentsDate["12:00"]))
                                    <div class="active-calendar personal-calendar calendar-1">
                                    <span class="info-active">
                                        <h2>{{$appointmentsDate["12:00"]->title}}</h2>
                                        <span>{{$appointmentsDate["12:00"]->location}}</span>
                                    </span>
                                    </div>
                                @else
                                    <div class="calendar-item"></div>
                                @endif

                                @if(isset($appointmentsDate["13:00"]))
                                    <div class="active-calendar personal-calendar calendar-1">
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["13:00"]->title}}</h2>
                                            <span>{{$appointmentsDate["13:00"]->location}}</span>
                                        </span>
                                    </div>
                                @else
                                    <div class="calendar-item"></div>
                                @endif

                                @if(isset($appointmentsDate["14:00"]))
                                    <div class="active-calendar personal-calendar calendar-1">
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["14:00"]->title}}</h2>
                                            <span>{{$appointmentsDate["14:00"]->location}}</span>
                                        </span>
                                    </div>
                                @else
                                    <div class="calendar-item"></div>
                                @endif

                                @if(isset($appointmentsDate["15:00"]))
                                    <div class="active-calendar personal-calendar calendar-1">
                                    <span class="info-active">
                                        <h2>{{$appointmentsDate["15:00"]->title}}</h2>
                                        <span>{{$appointmentsDate["15:00"]->location}}</span>
                                    </span>
                                    </div>
                                @else
                                    <div class="calendar-item"></div>
                                @endif

                                @if(isset($appointmentsDate["16:00"]))
                                    <div class="active-calendar personal-calendar calendar-1">
                                    <span class="info-active">
                                        <h2>{{$appointmentsDate["16:00"]->title}}</h2>
                                        <span>{{$appointmentsDate["16:00"]->location}}</span>
                                    </span>
                                    </div>
                                @else
                                    <div class="calendar-item"></div>
                                @endif

                                @if(isset($appointmentsDate["17:00"]))
                                    <div class="active-calendar personal-calendar calendar-1">
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["17:00"]->title}}</h2>
                                            <span>{{$appointmentsDate["17:00"]->location}}</span>
                                        </span>
                                    </div>
                                @else
                                    <div class="calendar-item"></div>
                                @endif

                                @if(isset($appointmentsDate["18:00"]))
                                    <div class="active-calendar personal-calendar calendar-1">
                                    <span class="info-active">
                                        <h2>{{$appointmentsDate["18:00"]->title}}</h2>
                                        <span>{{$appointmentsDate["18:00"]->location}}</span>
                                    </span>
                                    </div>
                                @else
                                    <div class="calendar-item"></div>
                                @endif

                                @if(isset($appointmentsDate["19:00"]))
                                    <div class="active-calendar personal-calendar calendar-1">
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["19:00"]->title}}</h2>
                                            <span>{{$appointmentsDate["19:00"]->location}}</span>
                                        </span>
                                    </div>
                                @else
                                    <div class="calendar-item"></div>
                                @endif

                                @if(isset($appointmentsDate["20:00"]))
                                    <div class="active-calendar personal-calendar calendar-1">
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["20:00"]->title}}</h2>
                                            <span>{{$appointmentsDate["20:00"]->location}}</span>
                                        </span>
                                    </div>
                                @else
                                    <div class="calendar-item"></div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                    <div class="day" id="{{$now->startOfWeek()->addDay()->format('d-m')}}">
                        <div class="active-calendar course-calendar calendar-4">
                        <span class="info-active">
                            <h2>Expert Lab</h2>
                            <span>B1.022</span>
                        </span>
                        </div>
                        <div class="calendar-item"></div>
                        <div class="calendar-item"></div>
                        <div class="calendar-item"></div>
                        <div class="calendar-item"></div>
                        <div class="calendar-item"></div>
                        <div class="calendar-item"></div>
                        <div class="calendar-item"></div>
                        <div class="calendar-item"></div>
                    </div>
                    <div class="day" id="{{ $now->startOfWeek()->addDays(2)->format('d-m') }}">
                        <div class="active-calendar course-calendar calendar-5">
                        <span class="info-active">
                            <h2>Expert Lab</h2>
                            <span>B1.022</span>
                        </span>
                        </div>

                        <div class="calendar-item"></div>
                        <div class="calendar-item"></div>

                        <div class="active-calendar course-calendar calendar-5">
                        <span class="info-active">
                            <h2>Expert Lab</h2>
                            <span>B1.022</span>
                        </span>
                        </div>
                    </div>

                    <div class="day" id="{{ $now->startOfWeek()->addDays(3)->format('d-m') }}">
                        <div class="calendar-item"></div>
                        <div class="calendar-item"></div>
                        <div class="calendar-item"></div>
                        <div class="calendar-item"></div>

                        <div class="active-calendar personal-calendar calendar-8">
                        <span class="info-active">
                            <h2>Expert Lab</h2>
                            <span>B1.022</span>
                        </span>
                        </div>
                    </div>

                    <div class="day" id="{{ $now->startOfWeek()->addDays(4)->format('d-m') }}">
                        <div class="active-calendar course-calendar calendar-12">9</div>
                    </div>
                </div>

            </div>
        </div>
    </x-card-large>

    @vite(['resources/css/calendar.css', 'resources/js/calendar.js'])
</x-app-layout>
