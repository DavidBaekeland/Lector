<?php

namespace App\Http\Livewire\Calendar;

use App\Models\Appointment;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public string $user;

    public $subjectCheckbox = false;

    public $selectedUsers;

    public $choiceUsers;

    public $name;

    public $startDate;

    public $startTime;

    public $endDate;

    public $endTime;


    public $location;

    public $subjectId;

    public function selectUser($user)
    {
        $this->selectedUsers[] = $user;
        $this->user = "";
        $this->choiceUsers = "";
    }

    public function updatedUser()
    {
        if ($this->user == null)
        {
            $this->choiceUsers = null;
        } else
        {
            $this->choiceUsers = User::where("first_name", "like", $this->user.'%')->where("id", "!=", auth()->user()->id)->get();
        }
    }

    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'location' => ['required', 'string', 'max:255'],
        'startDate' => ['required'],
        'startTime' => ['required'],
        'endDate' => ['required'],
        'endTime' => ['required'],
    ];

    public function submitPersonalAppointment()
    {
        $this->validate();

        $appointment = Appointment::create([
            "title" => $this->name,
            "location" => $this->location,
            "start_date" => $this->startDate,
            "start_time" => $this->startTime,
            "end_date" => $this->endDate,
            "end_time" => $this->endTime,
        ]);

        if ($this->selectedUsers)
        {
            $appointment->users()->sync([...$this->selectedUsers, auth()->user()->id]);
        } else
        {
            $appointment->users()->sync(auth()->user()->id);
        }

        return redirect()->route('calendar.index');
    }

    public function submitCourseAppointment()
    {
        //validatie
        $appointment = Appointment::create([
            "location" => $this->location,
            "start_date" => $this->startDate,
            "start_time" => $this->startTime,
            "end_date" => $this->endDate,
            "end_time" => $this->endTime,
            "subject_id" => $this->subjectId
        ]);

        return redirect()->route('calendar.index');
    }

    public function render()
    {
        return view('livewire.calendar.create');
    }
}
