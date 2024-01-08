<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('meetings', App\Http\Controllers\MeetingController::class);

Route::controller(App\Http\Controllers\RoomController::class)->group(function () {
    Route::get('/rooms', 'index');
    Route::get('/rooms/{room}', 'show');
    Route::post('/rooms/store', 'store');
    Route::put('/rooms/{room}/update', 'update');
    Route::delete('/rooms/{room}/destroy', 'destroy');
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
