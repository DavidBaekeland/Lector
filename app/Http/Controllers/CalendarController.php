<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function index() {
        $appointmentsDatesUser = auth()->user()->appointments->groupBy("start_date");

        $appointmentsDatesSubjects = [];

        foreach(auth()->user()->course->subjects as $subject)
        {
            foreach ($subject->appointments as $appointment)
            {
                $appointmentsDatesSubjects[] = $appointment;

            }
        }

        $datesSubjects = collect($appointmentsDatesSubjects)->groupBy("start_date")->map(function ($dates) {
            return $dates->map(function ($date) {
                return $date;
            });
        });

        $appointmentsPersonalDates = $appointmentsDatesUser->map(function ($dates) {
            return $dates->map(function ($date) {
                return $date;
            });
        });


        $combinedAppointmentsPerDayCollection = [];
        foreach ($datesSubjects as $keySubject => $value)
        {
            $day[$keySubject] = [];

            foreach ($value as $appointment)
            {
                $day[$keySubject][] = $appointment;
            }

            foreach ($appointmentsPersonalDates as $keyPersonal => $datesPersonal)
            {
                if ($keySubject == $keyPersonal)
                {
                    foreach ($datesPersonal as $datePersonal) {
                        $day[$keySubject][] = $datePersonal;
                    }
                } 
            }

            $combinedAppointmentsPerDayCollection[$keySubject] = $day[$keySubject];
        }

        $now = Carbon::now();

        $appointmentsDates2 = [];
        foreach ($combinedAppointmentsPerDayCollection as $key => $appointmentsDate) {
            $map = [];

            foreach ($appointmentsDate as $appointment) {
                $difference = Carbon::createFromFormat('H:i:s', $appointment->start_time)->diffInHours(Carbon::createFromFormat('H:i:s', $appointment->end_time));

                switch (Carbon::createFromFormat('H:i:s', $appointment->start_time)->format('H')) {
                    case "09":
                        $map["09:00"] = [$appointment, $difference];
                        break;
                    case "10":
                        $map["10:00"] = [$appointment, $difference];
                        break;
                    case "11":
                        $map["11:00"] = [$appointment, $difference];
                        break;
                    case "12":
                        $map["12:00"] = [$appointment, $difference];

                        break;
                    case "13":
                        $map["13:00"] = [$appointment, $difference];
                        break;
                    case "14":
                        $map["14:00"] = [$appointment, $difference];;
                        break;
                    case "15":
                        $map["15:00"] = [$appointment, $difference];
                        break;
                    case "16":
                        $map["16:00"] = [$appointment, $difference];
                        break;
                    case "17":
                        $map["17:00"] = [$appointment, $difference];;
                        break;
                    case "18":
                        $map["18:00"] = [$appointment, $difference];;
                        break;
                    case "19":
                        $map["19:00"] = [$appointment, $difference];;
                        break;
                    case "20":
                        $map["20:00"] = [$appointment, $difference];;
                        break;
                }
            }

            $appointmentsDates2[$key] = $map;
        }


        return view('calendar.index')->with(["appointmentsDates" => $appointmentsDates2, "now" => $now]);
    }

    public function create() {
        return view('calendar.create');
    }

    public function store(StoreAppointmentRequest $request) {
        $appointment = Appointment::create([
            "title" => $request->title,
            "location" => $request->location,
            "description" => "sdqfqsdfqsdfqsdf",
            "start_date" => $request->startDate,
            "start_time" => $request->startTime,
            "end_date" => $request->endDate,
            "end_time" => $request->endTime,
        ]);

        $appointment->users()->sync(auth()->user());

//        $date = Date::create([
//            "date" => $request->startDate,
//            "time" => $request->startTime,
//            "appointment_id" => $appointment->id
//        ]);

//        $date2 = Date::create([
//            "date" => $request->endDate,
//            "time" => $request->endTime,
//            "appointment_id" => $appointment->id
//        ]);


//        $date = Date::create([
//            "start_date" => date('Y-m-d H:i', strtotime("$request->startDate $request->startTime")),
//            "start_time" => $request->startTime,
//            "end_date" => $request->endDate,
//            "end_time" => $request->endTime,
//            "appointment_id" => $appointment->id
//        ]);


        return redirect()->route("calendar.index");
    }
}
