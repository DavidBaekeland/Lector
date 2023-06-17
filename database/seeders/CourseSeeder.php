<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\Appointment;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Document;
use App\Models\Subject;
use App\Models\Task;
use Carbon\Carbon;
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

        $subject1 = Subject::create([
            "name" => "Final work",
            "start_year" => "2022",
            "end_year" => "2023"
        ]);

        $subject2 = Subject::create([
            "name" => "Grow III",
            "start_year" => "2022",
            "end_year" => "2023"
        ]);

        $subject3 = Subject::create([
            "name" => "Expert Lab",
            "start_year" => "2022",
            "end_year" => "2023"
        ]);

        $subject4 = Subject::create([
            "name" => "Development V",
            "start_year" => "2022",
            "end_year" => "2023"
        ]);



        $course->subjects()->attach([$subject1->id, $subject2->id, $subject3->id, $subject4->id]);

        $chapter = Chapter::create([
            "title" => "Algemeen",
            "subject_id" => $subject1->id
        ]);

        $chapter3 = Chapter::create([
            "title" => "Voorbeeld magazines",
            "subject_id" => $subject1->id
        ]);

        $chapter2 = Chapter::create([
            "title" => "Voorbeeld showcases",
            "subject_id" => $subject1->id
        ]);

        Document::create([
            "file_name" => "template-onderzoeksvraag.pdf",
            "chapter_id" => $chapter->id
        ]);

        Document::create([
            "file_name" => "template-magazine.pdf",
            "chapter_id" => $chapter->id
        ]);

        Document::create([
            "file_name" => "template-onderzoeksplan.pdf",
            "chapter_id" => $chapter->id
        ]);

        Document::create([
            "file_name" => "template-design.pdf",
            "chapter_id" => $chapter->id
        ]);

        Document::create([
            "file_name" => "Magazine-David.pdf",
            "chapter_id" => $chapter3->id
        ]);

        Document::create([
            "file_name" => "Magazine-Elise.pdf",
            "chapter_id" => $chapter3->id
        ]);

        Document::create([
            "file_name" => "Magazine-Britt.pdf",
            "chapter_id" => $chapter3->id
        ]);

        Document::create([
            "file_name" => "Showcase-David.pdf",
            "chapter_id" => $chapter2->id
        ]);

        Document::create([
            "file_name" => "Showcase-Elise.pdf",
            "chapter_id" => $chapter2->id
        ]);

        Document::create([
            "file_name" => "Showcase-Britt.pdf",
            "chapter_id" => $chapter2->id
        ]);

        $chapter2 = Chapter::create([
            "title" => "Ondernemen",
            "subject_id" => $subject2->id
        ]);


        Document::create([
            "file_name" => "slides-opdracht.pdf",
            "chapter_id" => $chapter2->id
        ]);

        Document::create([
            "file_name" => "slides-bedrijfsplan.pdf",
            "chapter_id" => $chapter2->id
        ]);

        Document::create([
            "file_name" => "bedrijfsplan.xslx",
            "chapter_id" => $chapter2->id
        ]);

        $chapter3 = Chapter::create([
            "title" => "Introductie week",
            "subject_id" => $subject2->id
        ]);

        Document::create([
            "file_name" => "template-video.zip",
            "chapter_id" => $chapter3->id
        ]);

        Document::create([
            "file_name" => "template-website.zip",
            "chapter_id" => $chapter3->id
        ]);

        Document::create([
            "file_name" => "template-robot.zip",
            "chapter_id" => $chapter3->id
        ]);

        $chapter4 = Chapter::create([
            "title" => "Presenteren",
            "subject_id" => $subject2->id
        ]);

        Document::create([
            "file_name" => "slides-presenteren.pptx",
            "chapter_id" => $chapter4->id
        ]);

        Document::create([
            "file_name" => "slides-pitch.pptx",
            "chapter_id" => $chapter4->id
        ]);

        Document::create([
            "file_name" => "slides-events.pptx",
            "chapter_id" => $chapter4->id
        ]);

        Document::create([
            "file_name" => "uren-presentaties.xslx",
            "chapter_id" => $chapter4->id
        ]);

        $chapter5 = Chapter::create([
            "title" => "Web & App",
            "subject_id" => $subject3->id
        ]);

        Document::create([
            "file_name" => "vueJs.pdf",
            "chapter_id" => $chapter5->id
        ]);

        Document::create([
            "file_name" => "websockets.pdf",
            "chapter_id" => $chapter5->id
        ]);

        Document::create([
            "file_name" => "android.pdf",
            "chapter_id" => $chapter5->id
        ]);

        Document::create([
            "file_name" => "ios.pdf",
            "chapter_id" => $chapter5->id
        ]);

        $chapter6 = Chapter::create([
            "title" => "3D",
            "subject_id" => $subject3->id
        ]);

        Document::create([
            "file_name" => "Maya.pdf",
            "chapter_id" => $chapter6->id
        ]);

        Document::create([
            "file_name" => "Blender.pdf",
            "chapter_id" => $chapter6->id
        ]);

        Document::create([
            "file_name" => "Shaders.pdf",
            "chapter_id" => $chapter6->id
        ]);

        $chapter7 = Chapter::create([
            "title" => "Motion Graphics",
            "subject_id" => $subject3->id
        ]);

        Document::create([
            "file_name" => "parallax.pdf",
            "chapter_id" => $chapter7->id
        ]);

        Document::create([
            "file_name" => "keying.pdf",
            "chapter_id" => $chapter7->id
        ]);

        $chapter8 = Chapter::create([
            "title" => "Live Visuals",
            "subject_id" => $subject3->id
        ]);

        Document::create([
            "file_name" => "lichten.pdf",
            "chapter_id" => $chapter8->id
        ]);

        $chapter9 = Chapter::create([
            "title" => "Algemeen",
            "subject_id" => $subject4->id
        ]);

        Document::create([
            "file_name" => "typescript.pdf",
            "chapter_id" => $chapter9->id
        ]);

        Document::create([
            "file_name" => "go.pdf",
            "chapter_id" => $chapter9->id
        ]);

        Document::create([
            "file_name" => "typescript.pdf",
            "chapter_id" => $chapter9->id
        ]);

        Document::create([
            "file_name" => "rust.pdf",
            "chapter_id" => $chapter9->id
        ]);

        Task::create([
            "name" => "Magazine",
            "description" => "In week 8 werken we een pitch presentatie uit waarin de deliverables van de voorbije weken worden toegelicht en het prototype wordt voorgesteld. Daarin ligt je op logische wijze het verloop van het project toe. <br> <br> - Initiële vraagstelling <br>- Observaties en interviews en de daaruit volgende bevindingen <br>- De ontwikkeling van je ideeën <br>- Het bepalen van de scope <br>- De uitwerking van het prototype <br>- Het prototype <br><br>Geef daarbij voldoende aandacht aan de waarom van de bepaalde scope op basis van de bevindingen uit je onderzoek en de manier waarop je een oplossing biedt met je prototype. Voor dat laatste zijn de testen die je doet met het prototype waardevol als bewijs dat je oplossing doet wat je hebt beoogd.",
            "deadline" => now(),
            "points" => 40,
            "subject_id" => $subject1->id
        ]);

        Task::create([
            "name" => "Gebruikers documentatie",
            "description" => "In week 8 werken we een pitch presentatie uit waarin de deliverables van de voorbije weken worden toegelicht en het prototype wordt voorgesteld. Daarin ligt je op logische wijze het verloop van het project toe. <br> <br> - Initiële vraagstelling <br>- Observaties en interviews en de daaruit volgende bevindingen <br>- De ontwikkeling van je ideeën <br>- Het bepalen van de scope <br>- De uitwerking van het prototype <br>- Het prototype <br><br>Geef daarbij voldoende aandacht aan de waarom van de bepaalde scope op basis van de bevindingen uit je onderzoek en de manier waarop je een oplossing biedt met je prototype. Voor dat laatste zijn de testen die je doet met het prototype waardevol als bewijs dat je oplossing doet wat je hebt beoogd.",
            "deadline" => now()->addDay(),
            "points" => 40,
            "subject_id" => $subject1->id
        ]);

        Task::create([
            "name" => "Taak - Bedrijf",
            "description" => "In het onderdeel <b>Ondernemen</b> gaan moeten jullie een bedrijf oprichten.",
            "deadline" => now()->addDay(),
            "points" => 70,
            "subject_id" => $subject2->id
        ]);

        Task::create([
            "name" => "Taak - Typescript",
            "description" => "Voor deze taak gaan jullie in groep een kleine webshop ontwikkelen met Typescript.",
            "deadline" => now()->addHours(2),
            "points" => 20,
            "subject_id" => $subject4->id
        ]);

        Task::create([
            "name" => "Taak - Javascript",
            "description" => "Voor deze taak is het de bedoeling dat je 3 kleine websites maakt met 3 verschillende frontend frameworks naar keuze.",
            "deadline" => now()->addHours(2),
            "points" => 20,
            "subject_id" => $subject4->id
        ]);

        Task::create([
            "name" => "Taak - Rust",
            "description" => "In het onderdereel <b>Presenteren</b> verschillende technieken geleerd om te kunnen presenteren. Voor deze taak moeten jullie een presentatie geven van 30 minuten over één van de volgende onderwerpen. <br> <br> - AI <br>- AR/VR <br>- Impact van technologië op het mileu<br>- Apple VS Microsoft <br>- ChatGPT vs Google Bard VS Bing Chat <br><br>In deze taak dien jullie presentaties in. De uren van de presenatie worden later nog meegedeeld. Het onderdeel <b>Presenteren</b> telt mee voor 20% van de punten.",
            "deadline" => now()->subWeek(2),
            "points" => 20,
            "subject_id" => $subject4->id
        ]);

        Task::create([
            "name" => "Taak - Go",
            "description" => "In het onderdereel <b>Presenteren</b> verschillende technieken geleerd om te kunnen presenteren. Voor deze taak moeten jullie een presentatie geven van 30 minuten over één van de volgende onderwerpen. <br> <br> - AI <br>- AR/VR <br>- Impact van technologië op het mileu<br>- Apple VS Microsoft <br>- ChatGPT vs Google Bard VS Bing Chat <br><br>In deze taak dien jullie presentaties in. De uren van de presenatie worden later nog meegedeeld. Het onderdeel <b>Presenteren</b> telt mee voor 20% van de punten.",
            "deadline" => now()->subMonth(2),
            "points" => 20,
            "subject_id" => $subject4->id
        ]);

        Announcement::create([
            "title" => "Intro",
            "announcement" => "Welkom bij Final Work. In dit onderdeel gaan jullie bachelor proef maken. Hierbij gaan jullie een heel jaar werken aan een groot project naar keuze.",
            "subject_id" => $subject1->id
        ]);

        Announcement::create([
            "title" => "Intro",
            "announcement" => "Beste studenten, <br><br> Welkom bij het Grow III. Dit jaar is Grow III onderverdeeld in delen. Deze zijn <b>Introductie week</b>, <b>Presenteren</b> en <b>ondernmen</b>.",
            "subject_id" => $subject2->id
        ]);


        Announcement::create([
            "title" => "Intro",
            "announcement" => "Welkom bij Expert Lab. In dit onderdeel gaan jullie verschillende prototypes maken.",
            "subject_id" => $subject3->id
        ]);

        Announcement::create([
            "title" => "Uren presentaties",
            "announcement" => "Beste studenten, <br><br> De uren van de presentaties staan in de module <b>Presenteren</b>. ",
            "subject_id" => $subject2->id
        ]);


        Announcement::create([
            "title" => "Intro",
            "announcement" => "Beste studenten, <br><br> Welkom bij het Development V.",
            "subject_id" => $subject4->id
        ]);

        Appointment::create([
            "location" => "Online",
            "start_date" => now()->addDay()->format("Y-m-d"),
            "start_time" => now()->addDay()->format("H:i"),
            "end_date" => now()->addDay()->format("Y-m-d"),
            "end_time" => now()->addDay()->addHours(2)->format("H:i"),
            "subject_id" => $subject1->id
        ]);

        Appointment::create([
            "location" => "A1",
            "start_date" => now()->addDays(2)->format("Y-m-d"),
            "start_time" => now()->addDays(2)->format("H:i"),
            "end_date" => now()->format("Y-m-d"),
            "end_time" => now()->addDays(2)->addHours(4)->format("H:i"),
            "subject_id" => $subject2->id
        ]);

        Appointment::create([
            "location" => "B0.12",
            "start_date" => now()->addDays(3)->format("Y-m-d"),
            "start_time" => Carbon::createFromTime(9, 00, 00),
            "end_date" => now()->format("Y-m-d"),
            "end_time" => Carbon::createFromTime(13, 00, 00),
            "subject_id" => $subject3->id
        ]);

        Appointment::create([
            "location" => "A4",
            "start_date" => now()->addDays(3)->format("Y-m-d"),
            "start_time" => Carbon::createFromTime(14, 00, 00),
            "end_date" => now()->format("Y-m-d"),
            "end_time" => Carbon::createFromTime(16, 00, 00),
            "subject_id" => $subject4->id
        ]);
    }
}
