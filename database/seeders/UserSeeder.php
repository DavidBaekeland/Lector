<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Chat;
use App\Models\Message;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'email' => "david.baekeland@student.ehb.be",
            'role_id' => 1
        ]);

        $docent = User::factory()->create([
            'email' => "a@a.a",
            'course_id' => 2,
            'role_id' => 2
        ]);

        $student = User::factory()->create([
            'email' => "student@ehb.be",
            'role_id' => 3,
            'course_id' => 2,
            'year' => User::YEARS[0]
        ]);

        $task = Task::all()->first();
        $task->users()->attach($student->id, ['points' => 80, 'file_name' => "DavidBaekeland.pdf"]);

        $appointment = Appointment::where("title", "=", "Persoonlijke afspraak")->pluck("id")->first();

        $student->appointments()->attach($appointment);


        $chat = Chat::first();
        $chat->users()->sync([$student->id, $docent->id]);

        Message::create([
            "message" => "Hoe gaat het?",
            "user_id" => $student->id,
            "chat_id" => $chat->id
        ]);

        Message::create([
            "message" => "Goed. En met jou?",
            "user_id" => $docent->id,
            "chat_id" => $chat->id
        ]);

    }
}
