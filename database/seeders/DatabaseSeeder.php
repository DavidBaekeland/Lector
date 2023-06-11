<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AppointmentSeeder::class,
            ChatSeeder::class,
            CourseSeeder::class,
            DashboardSeeder::class,
            MessageSeeder::class,
            RoleSeeder::class,
            UserSeeder::class
        ]);
    }
}
