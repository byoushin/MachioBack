<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
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
Route::get('/get_location/{event_id}', [LocationController::class, 'get_location']);
Route::post('/add_missions', [MissionController::class, 'add_missions']);
Route::post('/add_mission_participation', [MissionController::class, 'add_mission_participation']);
Route::get('/get_mission_list/{event_id}/{class}', [MissionController::class, 'get_mission_list']);
Route::post('/add_mission_photograph', [MissionController::class, 'add_mission_photograph']);
Route::get('/get_notification_list', [NotificationController::class, 'get_list']);

// Eventコントローラー
Route::post('/add_event', [EventController::class, 'add_event']);
Route::post('/participation', [EventController::class, 'participation']);
Route::post('/add_participation', [EventController::class, 'add_participation'])->name('add_participation');
Route::get('/add_participation_form/{event_id}', [EventController::class, 'add_participation_form'])->name('add_participation_form');
// Teamコントローラー
Route::post('/add_team', [TeamController::class, 'add_team'])->name('add_team');
Route::get('/get_myinfo/{participation_id}', [TeamController::class, 'get_myinfo']);
Route::get('/add_team_form', [TeamController::class, 'add_team_form'])->name('add_team_form');
Route::get('/score_move/{event_id}', [TeamController::class, 'score_move'])->name('score_move');
Route::post('/up_score', [TeamController::class, 'up_score'])->name('up_score');

// 追加した部分　管理者
// ホーム画面遷移
Route::get('/', [HomeController::class, 'index'])->name('home');

// 通知
Route::get('/show-notifications', [NotificationController::class, 'showNotifications']);
Route::get('/add-notification', [NotificationController::class, 'showAddNotificationForm']);
Route::post('/add-notification', [NotificationController::class, 'addNotification'])->name('add-notification');
Route::delete('/notifications/{id}', [NotificationController::class, 'deleteNotification'])->name('notifications.delete');

// ミッション
Route::post('/add-mission', [MissionController::class, 'addMission'])->name('add-mission');
Route::post('/check_mission', [MissionController::class, 'check_mission'])->name('check_mission');
Route::get('/show-missions', [MissionController::class, 'showMissions']);
Route::get('/add-mission-form', [MissionController::class, 'showAddMissionForm'])->name('add-mission-form');
Route::get('/mission/{id}', [MissionController::class, 'showDetails'])->name('mission.details');



Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/map', [LocationController::class, 'map'])->name('map');
Route::get('/locations', [LocationController::class, 'getMap']);

Route::get('/add_user_form', [AuthController::class, 'add_user_form'])->name('add_user_form');
Route::post('/add_user', [AuthController::class, 'register'])->name('add_user');