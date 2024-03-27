<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // ตรวจสอบว่ามีการ use model User ที่เหมาะสม
use App\Models\Rooms;
use App\Models\RoomType;


class UserController extends Controller
{
    public function index()
    {
        // ตัวดึงข้อมูล
        $users = User::all();
        $rooms = Rooms::all();
        $room_types = RoomType::all(); // ดึงข้อมูล room_types
        return view('data', compact('users', 'rooms', 'room_types'));
    }


    public function getUser(Request $request)
    {
        return $request->user();
    }


    // public function store(Request $request)
    // {
    //     $user = new User;
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = bcrypt($request->password);
    //     $user->save();

    //     return redirect()->back()->with('success', 'User created successfully.');
    // }


    // Insert Update Delete => Users
    public function insertUser(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            // 'created_at' => 'required|date',
        ]);

        // สร้าง user ใหม่
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); // ใช้ Hash เพื่อเข้ารหัส password
        // $user->created_at = $request->created_at;
        $user->save();

        // ส่งกลับไปยังหน้าที่ต้องการหลังจาก insert สำเร็จ
        return redirect('/data')->with('success', 'User inserted successfully');
    }

    public function editUser($id)
    {
        $user = User::find($id);
        return view('edit-user', compact('user'));
    }


    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/data')->with('success', 'User updated successfully');
    }


    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/data')->with('success', 'User deleted successfully');
    }




    //Insert Update Delete Room
    public function insertRoom(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);

        $room = new Rooms;
        $room->name = $request->name;
        $room->type = $request->type;
        $room->save();

        return redirect('/data')->with('success', 'Room inserted successfully');
    }

    public function editRoom($id)
    {
        $room = Rooms::find($id);
        return view('edit-room', compact('room'));
    }

    public function updateRoom(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);

        $room = Rooms::find($id);
        $room->name = $request->name;
        $room->type = $request->type;
        $room->save();

        return redirect('/data')->with('success', 'Room updated successfully');
    }

    public function deleteRoom($id)
    {
        $room = Rooms::find($id);
        $room->delete();

        return redirect('/data')->with('success', 'Room deleted successfully');
    }


}
