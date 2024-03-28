<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomStatus;

class RoomStatusController extends Controller
{
    public function index()
    {
        $room_status = RoomStatus::all(); // ดึงข้อมูล room_status
        return view('dashboard', compact('room_status')); // เปลี่ยนจาก 'room_status.index' เป็น 'dashboard'
    }






    // public function index()
    // {
    //     $rooms = RoomStatus::all();
    //     return view('room_status.index', compact('rooms')); // แก้ไขตรงนี้
    // }
}
