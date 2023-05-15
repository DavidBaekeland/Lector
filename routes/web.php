<?php

use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/chat', [ChatController::class, 'index'])->name('chat');

Route::get('/chat/create', [ChatController::class, 'create'])->name('chat.create');

Route::post('/chat', [MessageController::class, 'store'])->name('message.store');





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


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
