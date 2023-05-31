<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

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

        $announcements = $selectedSubject->announcements()->orderByDesc("created_at")->get();

        return view('courses.show', compact('subjects', 'selectedSubject', 'announcements'));
    }

    public function tasks($slug) {
        $subjects = auth()->user()->course->subjects;

        $selectedSubject = Subject::where('id', '=', $slug)->first();

        return view('courses.tasks', compact('subjects', 'selectedSubject'));
    }
    
    public function documents($slug) {
        $subjects = auth()->user()->course->subjects;

        $selectedSubject = Subject::where('id', '=', $slug)->first();

        return view('courses.documents', compact('subjects', 'selectedSubject'));
    }
}
