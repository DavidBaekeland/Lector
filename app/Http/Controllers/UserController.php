<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Mail\NewUser;
use App\Models\Course;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(User::class, 'user');
    }

    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        $roles = Role::all();

        $users->load([
            "role",
            "course"
        ]);

        $courses = Course::all();

        $show = false;

        return view("users.index", compact('users', 'show', 'courses', 'roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make(Str::random(10)),
            'role_id' => $request->role,
            'course_id' => $request->course,
            'year' => $request->year,
        ]);

        event(new Registered($user));

        Mail::to($user)->send(new NewUser($user));

        return redirect()->route("users.index");
    }

    public function destroyMultipleUsers(DeleteUserRequest $request)
    {
        foreach ($request->users as $user)
        {
            $user2 = User::find($user);

            $user2->delete();
        }

        return redirect()->back();
    }
}
