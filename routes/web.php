<?php

use App\Http\Controllers\Auth\PasswordController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/chat', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('chat');


Route::get('/calender', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('calender');


Route::get('/users', [UserController::class, "index"])
    ->middleware(['auth', 'verified'])
    ->name('user.index');

Route::post('/users', [UserController::class, "store"])
    ->middleware(['auth', 'verified'])
    ->name('user.store');

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
