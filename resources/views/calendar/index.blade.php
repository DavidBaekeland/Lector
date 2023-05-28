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
                        @if(array_key_exists($now->startOfWeek()->format('Y-m-d'), $appointmentsDatesTime))
                            @foreach($appointmentsDatesTime as $key => $appointmentsDate)
                            @if($key == $now->startOfWeek()->format('Y-m-d'))
                                @if(isset($appointmentsDate["09:00"]))
                                    <div @class([
                                        "active-calendar calendar-".$appointmentsDate["09:00"][1],
                                        "personal-calendar" => !$appointmentsDate["09:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["09:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["09:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["09:00"][0]->location}}</span>
                                        </span>
                                    </div>
                                @else
                                    <div class="calendar-item"></div>
                                @endif

                                @if(isset($appointmentsDate["10:00"]))
                                    <div @class([
                                    "active-calendar calendar-".$appointmentsDate["10:00"][1],
                                    "personal-calendar" => !$appointmentsDate["10:00"][0]->subject,
                                    "course-calendar" => $appointmentsDate["10:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["10:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["10:00"][0]->location}}</span>
                                        </span>
                                    </div>
                                @elseif(!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<2)
                                    <div class="calendar-item"></div>
                                @endif

                                @if(isset($appointmentsDate["11:00"]))
                                    <div @class([
                                        "active-calendar calendar-".$appointmentsDate["11:00"][1],
                                        "personal-calendar" => !$appointmentsDate["11:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["11:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["11:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["11:00"][0]->location}}</span>
                                        </span>
                                    </div>
                                @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<3) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<2))
                                    <div class="calendar-item"></div>
                                @endif

                                @if(isset($appointmentsDate["12:00"]))
                                    <div @class([
                                        "active-calendar calendar-".$appointmentsDate["12:00"][1],
                                        "personal-calendar" => !$appointmentsDate["12:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["12:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["12:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["12:00"][0]->location}}</span>
                                        </span>
                                    </div>
                                @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<4) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<3) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<2))
                                    <div class="calendar-item"></div>
                                @endif

                                @if(isset($appointmentsDate["13:00"]))
                                    <div @class([
                                        "active-calendar calendar-".$appointmentsDate["13:00"][1],
                                        "personal-calendar" => !$appointmentsDate["13:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["13:00"][0]->subject,
                                    ])>
                                            <span class="info-active">
                                                <h2>{{$appointmentsDate["13:00"][0]->title}}</h2>
                                                <span>{{$appointmentsDate["13:00"][0]->location}}</span>
                                            </span>
                                    </div>
                                @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<5) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<4) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<3) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<2))
                                    <div class="calendar-item"></div>
                                @endif

                                @if(isset($appointmentsDate["14:00"]))
                                    <div @class([
                                        "active-calendar calendar-".$appointmentsDate["14:00"][1],
                                        "personal-calendar" => !$appointmentsDate["14:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["14:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["14:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["14:00"][0]->location}}</span>
                                        </span>
                                    </div>
                                @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<6) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<5) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<4) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<3) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<2))
                                    <div class="calendar-item"></div>
                                @endif

                                @if(isset($appointmentsDate["15:00"]))
                                    <div @class([
                                        "active-calendar calendar-".$appointmentsDate["15:00"][1],
                                        "personal-calendar" => !$appointmentsDate["15:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["15:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["15:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["15:00"][0]->location}}</span>
                                        </span>
                                    </div>
                                @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<7) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<6) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<5) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<4) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<3) && (!isset($appointmentsDate["14:00"]) || $appointmentsDate["14:00"][1]<2))
                                    <div class="calendar-item"></div>
                                @endif

                                @if(isset($appointmentsDate["16:00"]))
                                    <div @class([
                                        "active-calendar calendar-".$appointmentsDate["16:00"][1],
                                        "personal-calendar" => !$appointmentsDate["16:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["16:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["16:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["16:00"][0]->location}}</span>
                                        </span>
                                    </div>
                                @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<8) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<7) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<6) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<5) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<4) && (!isset($appointmentsDate["14:00"]) || $appointmentsDate["14:00"][1]<3) && (!isset($appointmentsDate["15:00"]) ||$appointmentsDate["15:00"][1]<2))
                                    <div class="calendar-item"></div>
                                @endif

                                @if(isset($appointmentsDate["17:00"]))
                                    <div @class([
                                        "active-calendar calendar-".$appointmentsDate["17:00"][1],
                                        "personal-calendar" => !$appointmentsDate["17:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["17:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["17:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["17:00"][0]->location}}</span>
                                        </span>
                                    </div>
                                @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<9) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<8) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<7) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<6) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<5) && (!isset($appointmentsDate["14:00"]) || $appointmentsDate["14:00"][1]<4) && (!isset($appointmentsDate["15:00"]) || $appointmentsDate["15:00"][1]<3) && (!isset($appointmentsDate["16:00"]) || $appointmentsDate["16:00"][1]<2))
                                    <div class="calendar-item"></div>
                                @endif

                                @if(isset($appointmentsDate["18:00"]))
                                    <div @class([
                                        "active-calendar calendar-".$appointmentsDate["18:00"][1],
                                        "personal-calendar" => !$appointmentsDate["18:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["18:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["18:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["18:00"][0]->location}}</span>
                                        </span>
                                    </div>
                                @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<10) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<9) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<8) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<7) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<6) && (!isset($appointmentsDate["14:00"]) || $appointmentsDate["14:00"][1]<5) && (!isset($appointmentsDate["15:00"]) || $appointmentsDate["15:00"][1]<4) && (!isset($appointmentsDate["16:00"]) || $appointmentsDate["16:00"][1]<3) && (!isset($appointmentsDate["17:00"]) || $appointmentsDate["17:00"][1]<2))
                                    <div class="calendar-item"></div>
                                @endif

                                @if(isset($appointmentsDate["19:00"]))
                                    <div @class([
                                        "active-calendar calendar-".$appointmentsDate["19:00"][1],
                                        "personal-calendar" => !$appointmentsDate["19:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["19:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["19:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["19:00"][0]->location}}</span>
                                        </span>
                                    </div>
                                @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<11) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<10) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<9) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<8) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<7) && (!isset($appointmentsDate["14:00"]) || $appointmentsDate["14:00"][1]<6) && (!isset($appointmentsDate["15:00"]) || $appointmentsDate["15:00"][1]<5) && (!isset($appointmentsDate["16:00"]) || $appointmentsDate["16:00"][1]<4) && (!isset($appointmentsDate["17:00"]) || $appointmentsDate["17:00"][1]<3) && (!isset($appointmentsDate["18:00"]) || $appointmentsDate["18:00"][1]<2))
                                    <div class="calendar-item"></div>
                                @endif

                                @if(isset($appointmentsDate["20:00"]))
                                    <div @class([
                                        "active-calendar calendar-".$appointmentsDate["20:00"][1],
                                        "personal-calendar" => !$appointmentsDate["20:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["20:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["20:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["20:00"][0]->location}}</span>
                                        </span>
                                    </div>
                                @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<12) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<11) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<10) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<9) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<8) && (!isset($appointmentsDate["14:00"]) || $appointmentsDate["14:00"][1]<7) && (!isset($appointmentsDate["15:00"]) || $appointmentsDate["15:00"][1]<6) && (!isset($appointmentsDate["16:00"]) || $appointmentsDate["16:00"][1]<5) && (!isset($appointmentsDate["17:00"]) || $appointmentsDate["17:00"][1]<4) && (!isset($appointmentsDate["18:00"]) || $appointmentsDate["18:00"][1]<3) && (!isset($appointmentsDate["19:00"]) || $appointmentsDate["19:00"][1]<2))
                                    <div class="calendar-item"></div>
                                @endif
                            @endif
                        @endforeach
                        @else
                            @for($i = 0; $i<=11; $i++)
                                <div class="calendar-item"></div>
                            @endfor
                        @endif
                    </div>
                    <div class="day" id="{{$now->startOfWeek()->addDay()->format('d-m')}}">
                        @if(array_key_exists($now->startOfWeek()->addDay()->format('Y-m-d'), $appointmentsDatesTime))
                            @foreach($appointmentsDatesTime as $key => $appointmentsDate)
                                @if($key == $now->startOfWeek()->addDay()->format('Y-m-d'))
                                    @if(isset($appointmentsDate["09:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["09:00"][1],
                                        "personal-calendar" => !$appointmentsDate["09:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["09:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["09:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["09:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @else
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["10:00"]))
                                        <div @class([
                                    "active-calendar calendar-".$appointmentsDate["10:00"][1],
                                    "personal-calendar" => !$appointmentsDate["10:00"][0]->subject,
                                    "course-calendar" => $appointmentsDate["10:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["10:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["10:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif(!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<2)
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["11:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["11:00"][1],
                                        "personal-calendar" => !$appointmentsDate["11:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["11:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["11:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["11:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<3) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["12:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["12:00"][1],
                                        "personal-calendar" => !$appointmentsDate["12:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["12:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["12:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["12:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<4) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<3) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["13:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["13:00"][1],
                                        "personal-calendar" => !$appointmentsDate["13:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["13:00"][0]->subject,
                                    ])>
                                            <span class="info-active">
                                                <h2>{{$appointmentsDate["13:00"][0]->title}}</h2>
                                                <span>{{$appointmentsDate["13:00"][0]->location}}</span>
                                            </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<5) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<4) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<3) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["14:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["14:00"][1],
                                        "personal-calendar" => !$appointmentsDate["14:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["14:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["14:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["14:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<6) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<5) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<4) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<3) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["15:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["15:00"][1],
                                        "personal-calendar" => !$appointmentsDate["15:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["15:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["15:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["15:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<7) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<6) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<5) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<4) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<3) && (!isset($appointmentsDate["14:00"]) || $appointmentsDate["14:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["16:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["16:00"][1],
                                        "personal-calendar" => !$appointmentsDate["16:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["16:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["16:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["16:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<8) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<7) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<6) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<5) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<4) && (!isset($appointmentsDate["14:00"]) || $appointmentsDate["14:00"][1]<3) && (!isset($appointmentsDate["15:00"]) ||$appointmentsDate["15:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["17:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["17:00"][1],
                                        "personal-calendar" => !$appointmentsDate["17:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["17:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["17:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["17:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<9) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<8) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<7) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<6) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<5) && (!isset($appointmentsDate["14:00"]) || $appointmentsDate["14:00"][1]<4) && (!isset($appointmentsDate["15:00"]) || $appointmentsDate["15:00"][1]<3) && (!isset($appointmentsDate["16:00"]) || $appointmentsDate["16:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["18:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["18:00"][1],
                                        "personal-calendar" => !$appointmentsDate["18:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["18:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["18:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["18:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<10) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<9) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<8) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<7) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<6) && (!isset($appointmentsDate["14:00"]) || $appointmentsDate["14:00"][1]<5) && (!isset($appointmentsDate["15:00"]) || $appointmentsDate["15:00"][1]<4) && (!isset($appointmentsDate["16:00"]) || $appointmentsDate["16:00"][1]<3) && (!isset($appointmentsDate["17:00"]) || $appointmentsDate["17:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["19:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["19:00"][1],
                                        "personal-calendar" => !$appointmentsDate["19:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["19:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["19:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["19:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<11) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<10) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<9) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<8) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<7) && (!isset($appointmentsDate["14:00"]) || $appointmentsDate["14:00"][1]<6) && (!isset($appointmentsDate["15:00"]) || $appointmentsDate["15:00"][1]<5) && (!isset($appointmentsDate["16:00"]) || $appointmentsDate["16:00"][1]<4) && (!isset($appointmentsDate["17:00"]) || $appointmentsDate["17:00"][1]<3) && (!isset($appointmentsDate["18:00"]) || $appointmentsDate["18:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["20:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["20:00"][1],
                                        "personal-calendar" => !$appointmentsDate["20:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["20:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["20:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["20:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<12) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<11) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<10) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<9) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<8) && (!isset($appointmentsDate["14:00"]) || $appointmentsDate["14:00"][1]<7) && (!isset($appointmentsDate["15:00"]) || $appointmentsDate["15:00"][1]<6) && (!isset($appointmentsDate["16:00"]) || $appointmentsDate["16:00"][1]<5) && (!isset($appointmentsDate["17:00"]) || $appointmentsDate["17:00"][1]<4) && (!isset($appointmentsDate["18:00"]) || $appointmentsDate["18:00"][1]<3) && (!isset($appointmentsDate["19:00"]) || $appointmentsDate["19:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif
                                @endif
                            @endforeach
                        @else
                            @for($i = 0; $i<=11; $i++)
                                <div class="calendar-item"></div>
                            @endfor
                        @endif
                    </div>
                    <div class="day" id="{{ $now->startOfWeek()->addDays(2)->format('d-m') }}">
                        @if(array_key_exists($now->startOfWeek()->addDays(2)->format('Y-m-d'), $appointmentsDatesTime))
                            @foreach($appointmentsDatesTime as $key => $appointmentsDate)
                                @if($key == $now->startOfWeek()->addDays(2)->format('Y-m-d'))
                                    @if(isset($appointmentsDate["09:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["09:00"][1],
                                        "personal-calendar" => !$appointmentsDate["09:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["09:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["09:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["09:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @else
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["10:00"]))
                                        <div @class([
                                    "active-calendar calendar-".$appointmentsDate["10:00"][1],
                                    "personal-calendar" => !$appointmentsDate["10:00"][0]->subject,
                                    "course-calendar" => $appointmentsDate["10:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["10:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["10:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif(!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<2)
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["11:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["11:00"][1],
                                        "personal-calendar" => !$appointmentsDate["11:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["11:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["11:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["11:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<3) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["12:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["12:00"][1],
                                        "personal-calendar" => !$appointmentsDate["12:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["12:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["12:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["12:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<4) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<3) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["13:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["13:00"][1],
                                        "personal-calendar" => !$appointmentsDate["13:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["13:00"][0]->subject,
                                    ])>
                                            <span class="info-active">
                                                <h2>{{$appointmentsDate["13:00"][0]->title}}</h2>
                                                <span>{{$appointmentsDate["13:00"][0]->location}}</span>
                                            </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<5) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<4) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<3) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["14:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["14:00"][1],
                                        "personal-calendar" => !$appointmentsDate["14:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["14:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["14:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["14:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<6) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<5) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<4) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<3) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["15:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["15:00"][1],
                                        "personal-calendar" => !$appointmentsDate["15:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["15:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["15:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["15:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<7) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<6) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<5) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<4) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<3) && (!isset($appointmentsDate["14:00"]) || $appointmentsDate["14:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["16:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["16:00"][1],
                                        "personal-calendar" => !$appointmentsDate["16:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["16:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["16:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["16:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<8) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<7) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<6) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<5) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<4) && (!isset($appointmentsDate["14:00"]) || $appointmentsDate["14:00"][1]<3) && (!isset($appointmentsDate["15:00"]) ||$appointmentsDate["15:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["17:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["17:00"][1],
                                        "personal-calendar" => !$appointmentsDate["17:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["17:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["17:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["17:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<9) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<8) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<7) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<6) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<5) && (!isset($appointmentsDate["14:00"]) || $appointmentsDate["14:00"][1]<4) && (!isset($appointmentsDate["15:00"]) || $appointmentsDate["15:00"][1]<3) && (!isset($appointmentsDate["16:00"]) || $appointmentsDate["16:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["18:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["18:00"][1],
                                        "personal-calendar" => !$appointmentsDate["18:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["18:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["18:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["18:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<10) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<9) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<8) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<7) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<6) && (!isset($appointmentsDate["14:00"]) || $appointmentsDate["14:00"][1]<5) && (!isset($appointmentsDate["15:00"]) || $appointmentsDate["15:00"][1]<4) && (!isset($appointmentsDate["16:00"]) || $appointmentsDate["16:00"][1]<3) && (!isset($appointmentsDate["17:00"]) || $appointmentsDate["17:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["19:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["19:00"][1],
                                        "personal-calendar" => !$appointmentsDate["19:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["19:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["19:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["19:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<11) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<10) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<9) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<8) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<7) && (!isset($appointmentsDate["14:00"]) || $appointmentsDate["14:00"][1]<6) && (!isset($appointmentsDate["15:00"]) || $appointmentsDate["15:00"][1]<5) && (!isset($appointmentsDate["16:00"]) || $appointmentsDate["16:00"][1]<4) && (!isset($appointmentsDate["17:00"]) || $appointmentsDate["17:00"][1]<3) && (!isset($appointmentsDate["18:00"]) || $appointmentsDate["18:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["20:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["20:00"][1],
                                        "personal-calendar" => !$appointmentsDate["20:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["20:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["20:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["20:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<12) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<11) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<10) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<9) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<8) && (!isset($appointmentsDate["14:00"]) || $appointmentsDate["14:00"][1]<7) && (!isset($appointmentsDate["15:00"]) || $appointmentsDate["15:00"][1]<6) && (!isset($appointmentsDate["16:00"]) || $appointmentsDate["16:00"][1]<5) && (!isset($appointmentsDate["17:00"]) || $appointmentsDate["17:00"][1]<4) && (!isset($appointmentsDate["18:00"]) || $appointmentsDate["18:00"][1]<3) && (!isset($appointmentsDate["19:00"]) || $appointmentsDate["19:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif
                                @endif
                            @endforeach
                        @else
                            @for($i = 0; $i<=11; $i++)
                                <div class="calendar-item"></div>
                            @endfor
                        @endif
                    </div>

                    <div class="day" id="{{ $now->startOfWeek()->addDays(3)->format('d-m') }}">
                        @if(array_key_exists($now->startOfWeek()->addDays(3)->format('Y-m-d'), $appointmentsDatesTime))
                            @foreach($appointmentsDatesTime as $key => $appointmentsDate)
                                @if($key == $now->startOfWeek()->addDays(3)->format('Y-m-d'))
                                    @if(isset($appointmentsDate["09:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["09:00"][1],
                                        "personal-calendar" => !$appointmentsDate["09:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["09:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["09:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["09:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @else
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["10:00"]))
                                        <div @class([
                                    "active-calendar calendar-".$appointmentsDate["10:00"][1],
                                    "personal-calendar" => !$appointmentsDate["10:00"][0]->subject,
                                    "course-calendar" => $appointmentsDate["10:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["10:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["10:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif(!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<2)
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["11:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["11:00"][1],
                                        "personal-calendar" => !$appointmentsDate["11:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["11:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["11:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["11:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<3) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["12:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["12:00"][1],
                                        "personal-calendar" => !$appointmentsDate["12:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["12:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["12:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["12:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<4) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<3) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["13:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["13:00"][1],
                                        "personal-calendar" => !$appointmentsDate["13:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["13:00"][0]->subject,
                                    ])>
                                            <span class="info-active">
                                                <h2>{{$appointmentsDate["13:00"][0]->title}}</h2>
                                                <span>{{$appointmentsDate["13:00"][0]->location}}</span>
                                            </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<5) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<4) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<3) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["14:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["14:00"][1],
                                        "personal-calendar" => !$appointmentsDate["14:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["14:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["14:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["14:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<6) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<5) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<4) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<3) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["15:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["15:00"][1],
                                        "personal-calendar" => !$appointmentsDate["15:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["15:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["15:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["15:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<7) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<6) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<5) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<4) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<3) && (!isset($appointmentsDate["14:00"]) || $appointmentsDate["14:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["16:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["16:00"][1],
                                        "personal-calendar" => !$appointmentsDate["16:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["16:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["16:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["16:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<8) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<7) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<6) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<5) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<4) && (!isset($appointmentsDate["14:00"]) || $appointmentsDate["14:00"][1]<3) && (!isset($appointmentsDate["15:00"]) ||$appointmentsDate["15:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["17:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["17:00"][1],
                                        "personal-calendar" => !$appointmentsDate["17:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["17:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["17:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["17:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<9) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<8) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<7) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<6) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<5) && (!isset($appointmentsDate["14:00"]) || $appointmentsDate["14:00"][1]<4) && (!isset($appointmentsDate["15:00"]) || $appointmentsDate["15:00"][1]<3) && (!isset($appointmentsDate["16:00"]) || $appointmentsDate["16:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["18:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["18:00"][1],
                                        "personal-calendar" => !$appointmentsDate["18:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["18:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["18:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["18:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<10) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<9) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<8) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<7) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<6) && (!isset($appointmentsDate["14:00"]) || $appointmentsDate["14:00"][1]<5) && (!isset($appointmentsDate["15:00"]) || $appointmentsDate["15:00"][1]<4) && (!isset($appointmentsDate["16:00"]) || $appointmentsDate["16:00"][1]<3) && (!isset($appointmentsDate["17:00"]) || $appointmentsDate["17:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["19:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["19:00"][1],
                                        "personal-calendar" => !$appointmentsDate["19:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["19:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["19:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["19:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<11) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<10) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<9) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<8) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<7) && (!isset($appointmentsDate["14:00"]) || $appointmentsDate["14:00"][1]<6) && (!isset($appointmentsDate["15:00"]) || $appointmentsDate["15:00"][1]<5) && (!isset($appointmentsDate["16:00"]) || $appointmentsDate["16:00"][1]<4) && (!isset($appointmentsDate["17:00"]) || $appointmentsDate["17:00"][1]<3) && (!isset($appointmentsDate["18:00"]) || $appointmentsDate["18:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["20:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["20:00"][1],
                                        "personal-calendar" => !$appointmentsDate["20:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["20:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["20:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["20:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<12) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<11) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<10) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<9) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<8) && (!isset($appointmentsDate["14:00"]) || $appointmentsDate["14:00"][1]<7) && (!isset($appointmentsDate["15:00"]) || $appointmentsDate["15:00"][1]<6) && (!isset($appointmentsDate["16:00"]) || $appointmentsDate["16:00"][1]<5) && (!isset($appointmentsDate["17:00"]) || $appointmentsDate["17:00"][1]<4) && (!isset($appointmentsDate["18:00"]) || $appointmentsDate["18:00"][1]<3) && (!isset($appointmentsDate["19:00"]) || $appointmentsDate["19:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif
                                @endif
                            @endforeach
                        @else
                            @for($i = 0; $i<=11; $i++)
                                <div class="calendar-item"></div>
                            @endfor
                        @endif
                    </div>

                    <div class="day" id="{{ $now->startOfWeek()->addDays(4)->format('d-m') }}">
                        @if(array_key_exists($now->startOfWeek()->addDays(4)->format('Y-m-d'), $appointmentsDatesTime))
                            @foreach($appointmentsDatesTime as $key => $appointmentsDate)
                                @if($key == $now->startOfWeek()->addDays(4)->format('Y-m-d'))
                                    @if(isset($appointmentsDate["09:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["09:00"][1],
                                        "personal-calendar" => !$appointmentsDate["09:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["09:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["09:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["09:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @else
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["10:00"]))
                                        <div @class([
                                    "active-calendar calendar-".$appointmentsDate["10:00"][1],
                                    "personal-calendar" => !$appointmentsDate["10:00"][0]->subject,
                                    "course-calendar" => $appointmentsDate["10:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["10:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["10:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif(!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<2)
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["11:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["11:00"][1],
                                        "personal-calendar" => !$appointmentsDate["11:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["11:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["11:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["11:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<3) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["12:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["12:00"][1],
                                        "personal-calendar" => !$appointmentsDate["12:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["12:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["12:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["12:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<4) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<3) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["13:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["13:00"][1],
                                        "personal-calendar" => !$appointmentsDate["13:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["13:00"][0]->subject,
                                    ])>
                                            <span class="info-active">
                                                <h2>{{$appointmentsDate["13:00"][0]->title}}</h2>
                                                <span>{{$appointmentsDate["13:00"][0]->location}}</span>
                                            </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<5) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<4) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<3) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["14:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["14:00"][1],
                                        "personal-calendar" => !$appointmentsDate["14:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["14:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["14:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["14:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<6) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<5) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<4) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<3) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["15:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["15:00"][1],
                                        "personal-calendar" => !$appointmentsDate["15:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["15:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["15:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["15:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<7) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<6) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<5) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<4) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<3) && (!isset($appointmentsDate["14:00"]) || $appointmentsDate["14:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["16:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["16:00"][1],
                                        "personal-calendar" => !$appointmentsDate["16:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["16:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["16:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["16:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<8) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<7) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<6) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<5) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<4) && (!isset($appointmentsDate["14:00"]) || $appointmentsDate["14:00"][1]<3) && (!isset($appointmentsDate["15:00"]) ||$appointmentsDate["15:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["17:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["17:00"][1],
                                        "personal-calendar" => !$appointmentsDate["17:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["17:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["17:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["17:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<9) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<8) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<7) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<6) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<5) && (!isset($appointmentsDate["14:00"]) || $appointmentsDate["14:00"][1]<4) && (!isset($appointmentsDate["15:00"]) || $appointmentsDate["15:00"][1]<3) && (!isset($appointmentsDate["16:00"]) || $appointmentsDate["16:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["18:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["18:00"][1],
                                        "personal-calendar" => !$appointmentsDate["18:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["18:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["18:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["18:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<10) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<9) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<8) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<7) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<6) && (!isset($appointmentsDate["14:00"]) || $appointmentsDate["14:00"][1]<5) && (!isset($appointmentsDate["15:00"]) || $appointmentsDate["15:00"][1]<4) && (!isset($appointmentsDate["16:00"]) || $appointmentsDate["16:00"][1]<3) && (!isset($appointmentsDate["17:00"]) || $appointmentsDate["17:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["19:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["19:00"][1],
                                        "personal-calendar" => !$appointmentsDate["19:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["19:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["19:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["19:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<11) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<10) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<9) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<8) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<7) && (!isset($appointmentsDate["14:00"]) || $appointmentsDate["14:00"][1]<6) && (!isset($appointmentsDate["15:00"]) || $appointmentsDate["15:00"][1]<5) && (!isset($appointmentsDate["16:00"]) || $appointmentsDate["16:00"][1]<4) && (!isset($appointmentsDate["17:00"]) || $appointmentsDate["17:00"][1]<3) && (!isset($appointmentsDate["18:00"]) || $appointmentsDate["18:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif

                                    @if(isset($appointmentsDate["20:00"]))
                                        <div @class([
                                        "active-calendar calendar-".$appointmentsDate["20:00"][1],
                                        "personal-calendar" => !$appointmentsDate["20:00"][0]->subject,
                                        "course-calendar" => $appointmentsDate["20:00"][0]->subject,
                                    ])>
                                        <span class="info-active">
                                            <h2>{{$appointmentsDate["20:00"][0]->title}}</h2>
                                            <span>{{$appointmentsDate["20:00"][0]->location}}</span>
                                        </span>
                                        </div>
                                    @elseif((!isset($appointmentsDate["09:00"]) || $appointmentsDate["09:00"][1]<12) && (!isset($appointmentsDate["10:00"]) || $appointmentsDate["10:00"][1]<11) && (!isset($appointmentsDate["11:00"]) || $appointmentsDate["11:00"][1]<10) && (!isset($appointmentsDate["12:00"]) || $appointmentsDate["12:00"][1]<9) && (!isset($appointmentsDate["13:00"]) || $appointmentsDate["13:00"][1]<8) && (!isset($appointmentsDate["14:00"]) || $appointmentsDate["14:00"][1]<7) && (!isset($appointmentsDate["15:00"]) || $appointmentsDate["15:00"][1]<6) && (!isset($appointmentsDate["16:00"]) || $appointmentsDate["16:00"][1]<5) && (!isset($appointmentsDate["17:00"]) || $appointmentsDate["17:00"][1]<4) && (!isset($appointmentsDate["18:00"]) || $appointmentsDate["18:00"][1]<3) && (!isset($appointmentsDate["19:00"]) || $appointmentsDate["19:00"][1]<2))
                                        <div class="calendar-item"></div>
                                    @endif
                                @endif
                            @endforeach
                        @else
                            @for($i = 0; $i<=11; $i++)
                                <div class="calendar-item"></div>
                            @endfor
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </x-card-large>

    @vite(['resources/css/calendar.css', 'resources/js/calendar.js'])
</x-app-layout>
