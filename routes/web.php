<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\registerController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/register', [registerController::class, 'register']);
// routes/web.php
Route::get('/data', function () {
    return view('data');
});
Route::get('/data', [UserController::class, 'index']);
// Route::get('/data', [RoomsController::class, 'index']);
