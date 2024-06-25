<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\HomeController;
use Spatie\GoogleCalendar\Event;

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

Route::get('events', 'MeetingController@events')->name('events');

Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');

    Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('google_login');
    Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
});



Route::get('/meetings/calendar-view', [App\Http\Controllers\MeetingController::class, 'calendar_view'])->name('meetings.calendar_view');
Route::get('/meetings/card-view', [App\Http\Controllers\MeetingController::class, 'card_view'])->name('meetings.card_view');

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

    // Route::controller(App\Http\Controllers\InviteeController::class)->prefix('invitees')->as('invitees.')->group(function () {
    //     Route::get('/', 'index')->name('index');
    //     Route::get('/{invitee}', 'show')->name('show');
    //     Route::post('/store', 'store')->name('store');
    //     Route::put('/{invitee}/update', 'update')->name('update');
    //     Route::delete('/{invitee}/destroy', 'destroy')->name('destroy');
    // });
});

Route::get('fire_invite_mail', function () {
    \Illuminate\Support\Facades\Mail::to(['mohamedalashry12@gmail.com'])->send(new \App\Mail\InviteMeeting(\App\Models\Meeting::latest()->first()));
    return 'send invite mail successfully';
});

Route::get('fire_reminder_mail', function () {
    \Illuminate\Support\Facades\Mail::to(['test@email.com'])->send(new \App\Mail\ReminderMeeting(\App\Models\Meeting::latest()->first()));
    return 'send reminder mail successfully';
});
Route::get('fire_calendar', function () {


    //create a new event
    $event = new Event;

    $event->name = 'A new event';
    $event->description = 'Event description';
    $event->startDateTime = Carbon\Carbon::now();
    $event->endDateTime = Carbon\Carbon::now()->addHour();
    $event->addAttendee([
        'email' => 'john@example.com',
        'name' => 'John Doe',
        'comment' => 'Lorum ipsum',
        'responseStatus' => 'needsAction',
    ]);
    $event->addAttendee(['email' => 'anotherEmail@gmail.com']);
    $event->addMeetLink(); // optionally add a google meet link to the event

    $event->save();
    return $event;

    // get all future events on a calendar
    $events = Event::get();

    // update existing event
    $firstEvent = $events->first();
    $firstEvent->name = 'updated name';
    $firstEvent->save();

    $firstEvent->update(['name' => 'updated again']);

    // create a new event
    Event::create([
        'name' => 'A new event',
        'startDateTime' => Carbon\Carbon::now(),
        'endDateTime' => Carbon\Carbon::now()->addHour(),
    ]);

    // delete an event
    $event->delete();
});
