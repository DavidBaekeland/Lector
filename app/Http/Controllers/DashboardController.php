<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $chats = auth()->user()->chats->take(3);

        $appointmentsPersonal = Appointment::whereHas('users', function ($query) {
            return $query->where('start_date', '>=', now())->where('user_id', '=', auth()->user()->id);
        })->get();

        $appointmentsSubjects = [];
        $course = auth()->user()->course;

        if ($course)
        {
            foreach ($course->subjects as $subject)
            {
                foreach ($subject->appointments as $appointmentSubject)
                {
                    if($appointmentSubject->start_date >= now())
                    {
                        $appointmentsSubjects[] = $appointmentSubject;
                    }
                }
            }
        }

        $datesAppointments = [];

        if ($appointmentsPersonal && $appointmentsSubjects)
        {

            $datesAppointments = array_merge($appointmentsSubjects, $appointmentsPersonal->all());
            $datesAppointments = array_slice($datesAppointments, 0, 5);

        } elseif ($appointmentsPersonal->count()>0)
        {
            $datesAppointments = array_slice($appointmentsPersonal, 0, 5);

        } elseif ($appointmentsSubjects)
        {
            $datesAppointments = array_slice($appointmentsSubjects, 0, 5);
        }

        if (count($datesAppointments) > 0) {
            $datesAppointments = collect([...$datesAppointments])->sortBy("start_date")->take(3);
        }

        return view('dashboard', compact('chats', 'datesAppointments'));
    }
}
