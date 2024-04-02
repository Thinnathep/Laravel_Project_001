<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminControlle extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function someSuperadminFunction()
{
    if (Auth::user()->role == 'superadmin') {
        // ดำเนินการสำหรับ Superadmin
    } else {
        // กลับไปหน้าหลักหรือแสดงข้อความแจ้งเตือน
    }
}



}
