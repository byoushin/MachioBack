<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\MissionController;
// use App\Http\Controllers\ChatController;
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
Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('/add_user', function () {
    return view('add_user');
});
Route::get('/hello', function () {
    return view('hello');
});
Route::post('/up_location', [LocationController::class, 'up_location']);
Route::post('/add_team', [LocationController::class, 'add_team']);
Route::post('/up_score', [LocationController::class, 'up_score']);
Route::get('/get_location/{event_id}', [LocationController::class, 'get_location']);
Route::get('/get_myinfo/{participation_id}', [LocationController::class, 'get_myinfo']);
Route::post('/add_event', [EventController::class, 'add_event']);
Route::post('/participation', [EventController::class, 'participation']);
Route::post('/add_participation', [EventController::class, 'add_participation']);
Route::post('/add_missions', [MissionController::class, 'add_missions']);
Route::post('/add_mission_participation', [MissionController::class, 'add_mission_participation']);
Route::get('/get_mission_list/{event_id}/{class}', [MissionController::class, 'get_mission_list']);
Route::post('/add_mission_photograph', [MissionController::class, 'add_mission_photograph']);
Route::get('/get_notification_list', [NotificationController::class, 'get_list']);

