<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // ตรวจสอบว่ามีการ use model User ที่เหมาะสม
use App\Models\Rooms;
use App\Models\RoomType;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $rooms = Rooms::all();
        $room_types = RoomType::all(); // ดึงข้อมูล room_types
        return view('data', compact('users', 'rooms', 'room_types')); // ส่งข้อมูล room_types ไปยัง view
    }
}
