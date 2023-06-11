<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Dashboard;
use App\Models\Document;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index() {
        $chats = auth()->user()->chats->take(3);

        $appointmentsPersonal = auth()->user()->appointmentsPersonal;

        $appointmentsSubjects = [];
        $announcements = [];
        $course = auth()->user()->course;

        if ($course)
        {
            $subjects = $course->subjects;

            $subjects->load([
                "appointments",
                "announcements",
            ]);

            foreach ($subjects as $subject)
            {
                foreach ($subject->appointments as $appointmentSubject)
                {
                    if(Carbon::create($appointmentSubject->start_date) >= today())
                    {
                        $appointmentsSubjects[] = $appointmentSubject;
                    }
                }

                foreach ($subject->announcements as $announcementSubject)
                {
                    $announcements[] = $announcementSubject;
                }
            }
        }

        $datesAppointments = [];

        if ($appointmentsPersonal && $appointmentsSubjects)
        {
            $datesAppointments = array_merge($appointmentsSubjects, $appointmentsPersonal->all());
        } elseif ($appointmentsPersonal->count() > 0)
        {
            $datesAppointments = $appointmentsPersonal;

        } elseif ($appointmentsSubjects)
        {
            $datesAppointments = $appointmentsSubjects;
        }

        if (count($datesAppointments) > 0)
        {
            $datesAppointments = collect($datesAppointments)->sortBy("start_date")->take(3);
        }

        if (count($announcements) > 0)
        {
            $announcements = collect($announcements)->sortBy("created_at")->take(3);
        }

        $tasks = [];

        if (isset($subjects))
        {
            foreach ($subjects as $subject)
            {
                foreach ($subject->tasks as $task)
                {
                    if ($task->deadline>= now())
                    {
                        $tasks[] = $task;
                    }
                }
            }

            $deadlines = collect($tasks)->sortBy("deadline")->take(4);
        } else
        {
            $deadlines = [];
        }



        if (Gate::allows('see_points'))
        {
            $subjects = $course->subjects;
            $subjectPoints = [];

            foreach ($subjects as $subject)
            {
                $userPoints = 0;
                $taskPoints = 0;
                if($subject->pastTasks->isNotEmpty())
                {
                    foreach ($subject->pastTasks as $pastTask)
                    {
                        if (count($pastTask->user(auth()->user()->id)->get()) > 0)
                        {
                            $userPoints += $pastTask->user(auth()->user()->id)->first()->pivot->points;
                        }
                        $taskPoints += $pastTask->points;
                    }
                    $subjectPoints[$subject->name] = $userPoints/$taskPoints;
                } else
                {
                    $subjectPoints[$subject->name] = 1;
                }

            }

            return view('dashboard', compact('chats', 'datesAppointments', 'announcements', 'subjectPoints', 'deadlines'));
        } else {
            return view('dashboard', compact('chats', 'datesAppointments', 'announcements', 'deadlines'));
        }
    }

    public function update(Request $request)
    {
        if (isset($request->dashboard))
        {
            auth()->user()->dashboard()->sync(array_keys($request->dashboard));
        } else
        {
            auth()->user()->dashboard()->detach();
        }

        return redirect()->back();
    }
}
