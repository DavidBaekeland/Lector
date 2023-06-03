<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $subjects = auth()->user()->course->subjects;
        return view('courses.index', compact('subjects'));
    }

    public function show($slug) {
        $subjects = auth()->user()->course->subjects;

        $selectedSubject = Subject::where('id', '=', $slug)->first();

        $selectedSubject->load([
            "announcements"
        ]);

        $announcements = $selectedSubject->announcements->sortByDesc("created_at");

        return view('courses.show', compact('subjects', 'selectedSubject', 'announcements'));
    }

    public function tasks($slug) {
        $subjects = auth()->user()->course->subjects;

        $selectedSubject = Subject::where('id', '=', $slug)->first();

        return view('courses.tasks', compact('subjects', 'selectedSubject'));
    }

    public function tasksUpload(Request $request, $slug) {
        $task = Task::find($request->task);

        $path = 'tasks/'.$request->task.'/'.auth()->user()->id;
        foreach ($request->files as $key => $file)
        {
            $request->file($key)->storeAs($path, $request->file($key)->getClientOriginalName());
            $task->users()->attach(auth()->user()->id, ['points' => 0, 'date_submitted' => now(), 'file_name' => $request->file($key)->getClientOriginalName()]);
        }

        return response()->json("success");
    }

    public function documents($slug) {
        $subjects = auth()->user()->course->subjects;

        $selectedSubject = Subject::where('id', '=', $slug)->first();

        return view('courses.documents', compact('subjects', 'selectedSubject'));
    }
}
