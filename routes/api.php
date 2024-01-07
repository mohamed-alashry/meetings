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

Route::controller(App\Http\Controllers\RoomController::class)->group(function () {
    Route::get('/rooms', 'index');
    Route::get('/rooms/{room}', 'show');
    Route::post('/rooms/store', 'store');
    Route::put('/rooms/{room}/update', 'update');
    Route::delete('/rooms/{room}/destroy', 'destroy');
});
