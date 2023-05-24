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
        return view('calendar.index');
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
