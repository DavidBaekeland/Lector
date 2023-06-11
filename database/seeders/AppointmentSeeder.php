<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    public function run(): void
    {
        Appointment::create([
            "title" => "Persoonlijke afspraak",
            "location" => "Online",
            "start_date" => now()->format("Y-m-d"),
            "start_time" => now()->format("H:i"),
            "end_date" => now()->format("Y-m-d"),
            "end_time" => now()->addHours(2)->format("H:i"),
        ]);
    }
}
