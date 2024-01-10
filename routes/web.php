<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\HomeController;
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


// 追加した部分　管理者
// ホーム画面遷移
Route::get('/', [HomeController::class, 'index'])->name('home');

// 通知
Route::get('/show-notifications', [NotificationController::class, 'showNotifications']);
Route::get('/add-notification', [NotificationController::class, 'showAddNotificationForm']);
Route::post('/add-notification', [NotificationController::class, 'addNotification'])->name('add-notification');
Route::delete('/notifications/{id}', [NotificationController::class, 'deleteNotification'])->name('notifications.delete');

// ミッション
Route::get('/show-missions', [MissionController::class, 'showMissions']);
Route::post('/add-mission', [MissionController::class, 'addMission'])->name('add-mission');
Route::get('/add-mission-form', [MissionController::class, 'showAddMissionForm'])->name('add-mission-form');


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register');
