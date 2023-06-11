<?php

use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\CallController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;
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

Route::get('/', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::post('/cards', [DashboardController::class, 'update'])->middleware(['auth'])->name('dashboard.cards.update');


Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

Route::get('/courses/{slug}', [CourseController::class, 'show'])->name('courses.show');

Route::get('/courses/{slug}/tasks', [CourseController::class, 'tasks'])->name('courses.tasks');

Route::post('/courses/{slug}/tasks/create', [CourseController::class, 'storeTask'])->name('courses.tasks.store');

Route::post('/courses/{slug}/tasks/upload', [CourseController::class, 'tasksUpload'])->name('courses.tasks.upload');

Route::get('/courses/{slug}/tasks/{task}', [CourseController::class, 'checkTasks'])->name('courses.tasks.check');

Route::post('/courses/{slug}/tasks', [CourseController::class, 'downloadTask'])->name('courses.tasks.download');

Route::post('/courses/{slug}/tasks/{task}', [CourseController::class, 'gradeTask'])->name('courses.tasks.grade');



Route::get('/courses/{slug}/documents', [CourseController::class, 'documents'])->name('courses.documents');

Route::post('/courses/{slug}/documents/download', [CourseController::class, 'downloadDocument'])->name('courses.documents.download');

Route::post('/courses/{slug}/documents', [CourseController::class, 'storeChapter'])->name('courses.chapter.store');

Route::post('/courses/{slug}/announcement/create', [CourseController::class, 'storeAnnouncement'])->name('courses.announcement.store');




Route::get('/chat', [ChatController::class, 'index'])->name('chat');

Route::get('/chat/create', [ChatController::class, 'create'])->name('chat.create');

Route::post('/chat', [MessageController::class, 'store'])->name('message.store');



Route::post('/call', [CallController::class, 'call'])->middleware('auth')->name("call");

Route::get('/call/{chat_id}', [CallController::class, 'answer'])->middleware('auth')->name("call.peer");

// Melding sturen naar persoon die gesprek gestart is
Route::get('/call/{chat_id}/decline', [CallController::class, 'declineOtherPeer'])->middleware('auth')->name("call.decline");

Route::get('/stop', [CallController::class, 'stopCall'])->middleware(['auth'])->name("call.stop");



Route::get('/calendar', [CalendarController::class, 'index'])->middleware(['auth'])->name('calendar.index');

Route::get('/calendar/create', [CalendarController::class, 'create'])->middleware(['auth'])->name('calendar.create');

Route::post('/calendar/create', [CalendarController::class, 'store'])->middleware(['auth'])->name('calendar.store');


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

require __DIR__.'/auth.php';
