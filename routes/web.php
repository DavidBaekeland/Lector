<?php

use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\CallController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Peer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


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



Route::post('/call', [CallController::class, 'call'])->middleware('auth')->name("call");

Route::get('/call/{chat_id}', [CallController::class, 'answer'])->middleware('auth')->name("call.peer");

// Melding sturen naar persoon die gesprek gestart is
Route::get('/call/{chat_id}/decline', [CallController::class, 'declineOtherPeer'])->middleware('auth')->name("call.decline");

Route::get('/stop', [CallController::class, 'stopCall'])->middleware(['auth'])->name("call.stop");




//Route::post('/peer', function (Request $request) {
//    try {
//        event(new \App\Events\Peer($request->peerId));
//        return response()->json("succes");
//    } catch (Exception $e)  {
//        return response()->json($e);
//    }
//})->middleware('auth:sanctum');




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
