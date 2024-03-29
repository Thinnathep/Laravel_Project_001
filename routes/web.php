<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\AccountController;

Auth::routes();
//dashboard


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



// กำหนด route ที่ต้องการเองสำหรับการเข้าสู่ระบบ
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// กำหนด route ที่ต้องการเองสำหรับหน้า dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// กำหนด route ที่ต้องการเองสำหรับการลงทะเบียน
Route::get('/register', [registerController::class, 'index'])->name('register');
Route::post('/register', [registerController::class, 'register']);


// routes/web.php
Route::get('/data', function () {
    return view('data');
});
Route::get('/data', [UserController::class, 'index']);
// Route::get('/data', [RoomsController::class, 'index']);


//profile && Setting && General
Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/Setting', [SettingController::class, 'index']);
Route::get('/general', [GeneralController::class, 'index']);


Route::middleware('auth:api')->get('/user', [UserController::class, 'getUser']);

//  route insert update delete
Route::post('/insert-user', [UserController::class, 'insertUser']);
Route::get('/edit-user/{id}', [UserController::class, 'editUser']);
Route::post('/update-user/{id}', [UserController::class, 'updateUser']);
Route::delete('/delete-user/{id}', [UserController::class, 'deleteUser']);
Route::get('/edit-user/{id}', [UserController::class, 'editUser']);
Route::put('/update-user/{id}', [UserController::class, 'updateUser']);

Route::post('/insert-room', [UserController::class, 'insertRoom'])->name('insertRoom');
Route::get('/edit-room/{id}', [UserController::class, 'editRoom'])->name('editRoom');
Route::post('/update-room/{id}', [UserController::class, 'updateRoom'])->name('updateRoom');
Route::delete('/delete-room/{id}', [UserController::class, 'deleteRoom'])->name('deleteRoom');
Route::put('/update-room/{id}', [UserController::class, 'updateRoom'])->name('updateRoom');

Route::post('/insert-roomstatus', [UserController::class, 'insertRoomstatus'])->name('insertRoomstatus');
Route::get('/edit-roomstatus/{id}', [UserController::class, 'editRoomstatus'])->name('editRoomstatus');
Route::put('/update-roomstatus/{id}', [UserController::class, 'updateRoomstatus'])->name('updateRoomstatus');
Route::post('/update-roomstatus/{id}', [UserController::class, 'updateRoomstatus'])->name('updateRoomstatus');
Route::delete('/delete-roomstatus/{id}', [UserController::class, 'deleteRoomstatus'])->name('deleteRoomstatus');


Route::post('/insert-Account', [UserController::class, 'insertAccount'])->name('insertAccount');
Route::get('/edit-Account/{id}', [UserController::class, 'editAccount'])->name('editAccount');
Route::put('/update-Account/{id}', [UserController::class, 'updateAccount'])->name('updateAccount');
Route::post('/update-Account/{id}', [UserController::class, 'updateAccount'])->name('updateAccount');
Route::delete('/delete-Account/{id}', [UserController::class, 'deleteAccount'])->name('deleteAccount');

//Setting
Route::post('/changePassword', [SettingController::class, 'changePassword'])->name('changePassword');

//status room
use App\Http\Controllers\RoomStatusController;

Route::get('/room_status', [RoomStatusController::class, 'index']);
Route::get('/dashboard', [RoomStatusController::class, 'index']);
Route::get('/dashboard', [RoomStatusController::class, 'index'])->name('data');
Route::get('/dashboard', [RoomStatusController::class, 'index'])->name('dashboard');


//Data_view
Route::get('/data_view', [AccountController::class, 'index']);
