<x-app-layout>
    <x-card-large>
        <div class="dates">
            <h1> </h1>
            <h1>Ma - 22/5</h1>
            <h1>Di - 23/5</h1>
            <h1>Wo - 24/5</h1>
            <h1>Do - 25/5</h1>
            <h1>Vr - 26/5</h1>
        </div>
        <div id="calendar">
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
                <div class="day">
                    <div class="calendar-item"></div>
                    <div class="calendar-item"></div>
                    <div class="calendar-item"></div>
                    <div class="calendar-item"></div>
                    <div class="calendar-item"></div>
                    <div class="calendar-item"></div>
                    <div class="calendar-item"></div>
                    <div class="active-calendar course-calendar calendar-1">
                        <span class="info-active">
                            <h2>Design V</h2>
                            <span>B1.022</span>
                        </span>
                    </div>
                    <div class="calendar-item"></div>
                    <div class="active-calendar course-calendar calendar-2">
                        <span class="info-active">
                            <h2>Expert Lab</h2>
                            <span>B1.022</span>
                        </span>
                    </div>
                    <div class="calendar-item"></div>
                </div>
                <div class="day">
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
                <div class="day">
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

                <div class="day">
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

                <div class="day">
                    <div class="active-calendar course-calendar calendar-12">9</div>
                </div>
            </div>

        </div>
    </x-card-large>

    @vite(['resources/css/calendar.css', 'resources/js/calendar.js'])
</x-app-layout>
