<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\HomeController;

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

Route::get('events','MeetingController@events')->name('events');

Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', [HomeController::class, 'home'])->name('home');

    Route::controller(App\Http\Controllers\RoomController::class)->prefix('rooms')->as('rooms.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/monitor', 'monitor')->name('monitor');
        Route::get('/{room}', 'show')->name('show');
        Route::post('/store', 'store')->name('store');
        Route::put('/{room}/update', 'update')->name('update');
        Route::delete('/{room}/destroy', 'destroy')->name('destroy');
    });

    Route::controller(App\Http\Controllers\MeetingController::class)->prefix('meetings')->as('meetings.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/calendar-view', 'calendar_view')->name('calendar_view');
        Route::get('/card-view', 'card_view')->name('card_view');
        Route::get('/{meeting}', 'show')->name('show');
        Route::post('', 'store')->name('store');
        Route::put('/{meeting}', 'update')->name('update');
        Route::delete('/{meeting}', 'destroy')->name('destroy');
        Route::post('/invite', 'invite')->name('invite');
    });

    Route::controller(App\Http\Controllers\UserController::class)->prefix('users')->as('users.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{user}', 'show')->name('show');
        Route::post('/store', 'store')->name('store');
        Route::put('/{user}/update', 'update')->name('update');
        Route::delete('/{user}/destroy', 'destroy')->name('destroy');
    });

    Route::controller(App\Http\Controllers\InviteeController::class)->prefix('invitees')->as('invitees.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{invitee}', 'show')->name('show');
        Route::post('/store', 'store')->name('store');
        Route::put('/{invitee}/update', 'update')->name('update');
        Route::delete('/{invitee}/destroy', 'destroy')->name('destroy');
    });
});

Route::get('fire_invite_mail',function () {
    \Illuminate\Support\Facades\Mail::to(['test@email.com'])->send(new \App\Mail\InviteMeeting(\App\Models\Meeting::first()));
    return 'send invite mail successfully';
});

Route::get('fire_reminder_mail',function () {
    \Illuminate\Support\Facades\Mail::to(['test@email.com'])->send(new \App\Mail\ReminderMeeting(\App\Models\Meeting::first()));
    return 'send reminder mail successfully';
});
