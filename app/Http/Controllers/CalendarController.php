<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use App\Models\Date;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index() {
        $appointmentsDates = auth()->user()->appointments->groupBy("start_date");


        $now = Carbon::now();

        $appointmentsDates2 = [];
        foreach ($appointmentsDates as $key => $appointmentsDate) {
            $map = [];

            foreach ($appointmentsDate->sortBy('start_time') as $appointment) {
                switch (Carbon::createFromFormat('H:i:s', $appointment->start_time)->format('H')) {
                    case "09":
                        $map["09:00"] = $appointment;
                        break;
                    case "10":
                        $map["10:00"] = $appointment;
                        break;
                    case "11":
                        $map["11:00"] = $appointment;
                        break;
                    case "12":
                        $map["12:00"] = $appointment;
                        break;
                    case "13":
                        $map["13:00"] = $appointment;
                        break;
                    case "14":
                        $map["14:00"] = $appointment;
                        break;
                    case "15":
                        $map["15:00"] = $appointment;
                        break;
                    case "16":
                        $map["16:00"] = $appointment;
                        break;
                    case "17":
                        $map["17:00"] = $appointment;
                        break;
                    case "18":
                        $map["18:00"] = $appointment;
                        break;
                    case "19":
                        $map["19:00"] = $appointment;
                        break;
                    case "20":
                        $map["20:00"] = $appointment;
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
