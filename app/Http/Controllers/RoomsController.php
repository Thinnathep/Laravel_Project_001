<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms; // ตรวจสอบว่ามีการ use model Room ที่เหมาะสม

class RoomsController extends Controller
{
    public function index()
    {
        $rooms = Rooms::all(); // ดึงข้อมูล rooms ทั้งหมด
        return view('data', compact('rooms')); // ส่งข้อมูล rooms ไปยัง view
    }
}
