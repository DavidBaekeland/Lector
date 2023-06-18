<?php

namespace Database\Seeders;

use App\Models\Dashboard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DashboardSeeder extends Seeder
{
    public function run(): void
    {
        Dashboard::create([
            'title' => 'Aankondigingen'
        ]);

        Dashboard::create([
            'title' => 'Punten'
        ]);

        Dashboard::create([
            'title' => 'Chats'
        ]);

        Dashboard::create([
            'title' => 'Deadlines'
        ]);

        Dashboard::create([
            'title' => 'Agenda'
        ]);
    }
}
