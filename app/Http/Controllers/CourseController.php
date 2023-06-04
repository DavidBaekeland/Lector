<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
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

    public function show($slug, string $selectedAnnouncement = null)
    {
        $subjects = auth()->user()->course->subjects;

        $selectedSubject = Subject::where('id', '=', $slug)->first();

        $selectedSubject->load([
            "announcements"
        ]);

        $announcements = $selectedSubject->announcements->sortByDesc("created_at");

        if (isset($selectedAnnouncement))
        {
            return view('courses.show', compact('subjects', 'selectedSubject', 'announcements', 'selectedAnnouncement'));
        }

        return view('courses.show', compact('subjects', 'selectedSubject', 'announcements'));
    }

    public function tasks($slug)
    {
        $subjects = auth()->user()->course->subjects;

        $selectedSubject = Subject::where('id', '=', $slug)->first();

        $selectedSubject->load([
            "tasks"
        ]);

        return view('courses.tasks', compact('subjects', 'selectedSubject'));
    }

    public function AddTasks(Request $request)
    {
        $task = Task::find($request->task);

        $path = 'tasks/'.$request->task.'/'.auth()->user()->id;
        foreach ($request->files as $key => $file)
        {
            $request->file($key)->storeAs($path, $request->file($key)->getClientOriginalName());
            $task->users()->attach(auth()->user()->id, ['points' => 0, 'date_submitted' => now(), 'file_name' => $request->file($key)->getClientOriginalName()]);
        }

        return response()->json("success");
    }

    public function checkTasks($slug, Task $task)
    {
        if (! Gate::allows('manage_tasks')) {
            abort(403);
        }

        $subjects = auth()->user()->course->subjects;

        $selectedSubject = Subject::where('id', '=', $slug)->first();

        $tasks = [];
        foreach ($task->users as $user)
        {
            $tasks[$user->name][] = $user->pivot;
        }

        return view('courses.checkTask', compact('subjects', 'selectedSubject', 'tasks', 'slug', 'task'));
    }

    public function gradeTask($slug, Task $task, Request $request)
    {
        if (! Gate::allows('manage_tasks')) {
            abort(403);
        }

        $submittedTasks = $task->user($request->user_id)->get();

        foreach ($submittedTasks as $submittedTask)
        {
            $submittedTask->pivot->points = intval($request->points);
            $submittedTask->pivot->save();
        }

        return redirect()->route("courses.tasks.check", compact("slug", "task"));
    }

    public function downloadTask(Request $request)
    {
        if (! Gate::allows('manage_tasks')) {
            abort(403);
        }

        return Storage::download($request->file_name);
    }

    public function tasksUpload(Request $request, $slug)
    {
        $task = Task::find($request->task);

        $path = 'tasks/'.$request->task.'/'.auth()->user()->id;
        foreach ($request->files as $key => $file)
        {
            $request->file($key)->storeAs($path, $request->file($key)->getClientOriginalName());
            $task->users()->attach(auth()->user()->id, ['file_name' => $request->file($key)->getClientOriginalName()]);
        }

        return response()->json("success");
    }

    public function storeTask(Request $request)
    {
        if (! Gate::allows('manage_tasks')) {
            abort(403);
        }

        $deadline = date("Y-m-d H:i", strtotime("$request->deadlineDate $request->deadlineTime"));

        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'deadline' => $deadline,
            'points' => $request->points,
            'subject_id' => $request->slug,
        ]);

        return redirect()->route("courses.tasks", $request->slug);
    }

    public function documents($slug)
    {
        $subjects = auth()->user()->course->subjects;

        $selectedSubject = Subject::where('id', '=', $slug)->first();

        $selectedSubject->load([
            'chapters',
            'documents'
        ]);

        return view('courses.documents', compact('subjects', 'selectedSubject', 'slug'));
    }
    }
}
