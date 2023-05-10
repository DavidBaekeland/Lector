<?php

use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Mail\NewUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/courses', function () {
    return view('dashboard');
})->middleware(['auth'])->name('courses');

Route::get('/chat', function () {
    return view('dashboard');
})->middleware(['auth'])->name('chat');


Route::get('/calender', function () {
    return view('dashboard');
})->middleware(['auth'])->name('calender');


Route::resources([
    'users' => UserController::class,
]);

Route::post('/users/multiple', [UserController::class, "destroyMultipleUsers"])
    ->middleware(['auth'])
    ->can('manage_users')
    ->name('users.multiple.delete');

Route::get('/activate-account/{token}/{email}', [PasswordController::class, 'create'])->name('password.create');

Route::post('/activate-account', [PasswordController::class, 'store'])
    ->middleware('guest')
    ->name('user.activate');

Route::get('/mail', function () {
    Mail::to(Auth::user())->send(new NewUser(Auth::user()));
    return new NewUser(Auth::user());
})->middleware(['auth', 'verified'])->name('mail');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
