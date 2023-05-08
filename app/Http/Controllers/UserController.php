<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Mail\NewUser;
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
        $this->authorizeResource(User::class, 'user');
    }


    public function index()
    {
        $users = User::all();

        return view("users.index", compact('users'));
    }

    public function create()
    {
        //
    }


    public function store(StoreUserRequest $request)
    {
        $role_id = Role::where("name", $request->role)->first()->id;

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make(Str::random(4)),
            'role_id' => $role_id
        ]);

        event(new Registered($user));

        Mail::to($user)->send(new NewUser($user));

        return redirect()->back();
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
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
