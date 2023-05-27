<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'email' => "david.baekeland@student.ehb.be",
            'role_id' => 1
        ]);

        User::factory()->create([
            'email' => "a@a.a",
            'role_id' => 2
        ]);

        User::factory()->create([
            'email' => "b@b.be",
            'role_id' => 3,
            'course_id' => 1,
            'year' => User::YEARS[0]
        ]);

    }
}
