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


Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/home', [HomeController::class, 'home'])->name('home');

    Route::controller(App\Http\Controllers\RoomController::class)->group(function () {
        Route::get('/rooms', 'index');
        Route::get('/rooms/{room}', 'show');
        Route::post('/rooms/store', 'store');
        Route::put('/rooms/{room}/update', 'update');
        Route::delete('/rooms/{room}/destroy', 'destroy');
    });

    Route::controller(App\Http\Controllers\MeetingController::class)->group(function () {
        Route::get('/meetings', 'index');
        Route::get('/meetings/{meeting}', 'show');
        Route::post('/meetings', 'store');
        Route::put('/meetings/{meeting}', 'update');
        Route::delete('/meetings/{meeting}', 'destroy');
        Route::post('/meetings/invite', 'invite');
    });

    Route::controller(App\Http\Controllers\UserController::class)->group(function () {
        Route::get('/users', 'index');
        Route::get('/users/{user}', 'show');
        Route::post('/users/store', 'store');
        Route::put('/users/{user}/update', 'update');
        Route::delete('/users/{user}/destroy', 'destroy');
    });

    Route::controller(App\Http\Controllers\InviteeController::class)->group(function () {
        Route::get('/invitees', 'index');
        Route::get('/invitees/{invitee}', 'show');
        Route::post('/invitees/store', 'store');
        Route::put('/invitees/{invitee}/update', 'update');
        Route::delete('/invitees/{invitee}/destroy', 'destroy');
    });
});
