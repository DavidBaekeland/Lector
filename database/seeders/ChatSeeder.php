<?php

namespace Database\Seeders;

use App\Models\Chat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Chat::create([
            "name" => "Chat 1"
        ]);

        Chat::create([
            "name" => "Chat 2"
        ]);

        Chat::create([
            "name" => "Chat 3"
        ]);

        Chat::create([
            "name" => "Chat 3"
        ]);
    }
}
