<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\Appointment;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Document;
use App\Models\Subject;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        Course::create([
            "name" => "Toepepaste Informatica"
        ]);

        $course = Course::create([
            "name" => "Multimedia & Creatieve Technologieën"
        ]);

        $subject = Subject::create([
            "name" => "Final work",
            "start_year" => "2022",
            "end_year" => "2023"
        ]);

        $course->subjects()->attach($subject->id);

        $chapter = Chapter::create([
            "title" => "Magazines",
            "subject_id" => $subject->id
        ]);

        Document::create([
            "file_name" => "testMagzine.pdf",
            "chapter_id" => $chapter->id
        ]);

        Document::create([
            "file_name" => "testMagzine2.pdf",
            "chapter_id" => $chapter->id
        ]);

        Document::create([
            "file_name" => "testMagzine2.pdf",
            "chapter_id" => $chapter->id
        ]);

        Task::create([
            "name" => "Magazine",
            "description" => "In week 8 werken we een pitch presentatie uit waarin de deliverables van de voorbije weken worden toegelicht en het prototype wordt voorgesteld. Daarin ligt je op logische wijze het verloop van het project toe. <br> <br> - Initiële vraagstelling <br>- Observaties en interviews en de daaruit volgende bevindingen <br>- De ontwikkeling van je ideeën <br>- Het bepalen van de scope <br>- De uitwerking van het prototype <br>- Het prototype <br><br>Geef daarbij voldoende aandacht aan de waarom van de bepaalde scope op basis van de bevindingen uit je onderzoek en de manier waarop je een oplossing biedt met je prototype. Voor dat laatste zijn de testen die je doet met het prototype waardevol als bewijs dat je oplossing doet wat je hebt beoogd.",
            "deadline" => now(),
            "points" => 40,
            "subject_id" => $subject->id
        ]);

        Task::create([
            "name" => "Gebruikers documentatie",
            "description" => "In week 8 werken we een pitch presentatie uit waarin de deliverables van de voorbije weken worden toegelicht en het prototype wordt voorgesteld. Daarin ligt je op logische wijze het verloop van het project toe. <br> <br> - Initiële vraagstelling <br>- Observaties en interviews en de daaruit volgende bevindingen <br>- De ontwikkeling van je ideeën <br>- Het bepalen van de scope <br>- De uitwerking van het prototype <br>- Het prototype <br><br>Geef daarbij voldoende aandacht aan de waarom van de bepaalde scope op basis van de bevindingen uit je onderzoek en de manier waarop je een oplossing biedt met je prototype. Voor dat laatste zijn de testen die je doet met het prototype waardevol als bewijs dat je oplossing doet wat je hebt beoogd.",
            "deadline" => now(),
            "points" => 40,
            "subject_id" => $subject->id
        ]);

        Announcement::create([
            "title" => "Intro",
            "announcement" => "Welkom bij Final Work. In dit onderdeel gaan we geweldige bachelor proef realiseren ...",
            "subject_id" => $subject->id
        ]);

        Appointment::create([
            "location" => "Online",
            "start_date" => now()->addDay()->format("Y-m-d"),
            "start_time" => now()->addDay()->format("H:i"),
            "end_date" => now()->format("Y-m-d"),
            "end_time" => now()->addHours(2)->format("H:i"),
            "subject_id" => $subject->id
        ]);
    }
}
