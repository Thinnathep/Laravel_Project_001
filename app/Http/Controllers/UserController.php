<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // ตรวจสอบว่ามีการ use model User ที่เหมาะสม
use App\Models\Rooms;
use App\Models\RoomType;
use App\Models\RoomStatus;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index()
    {
        // ดึงข้อมูลจากฐานข้อมูล
        $users = User::all();
        $rooms = Rooms::all();
        $room_types = RoomType::all(); // ดึงข้อมูล room_types
        $room_status = RoomStatus::all(); // ดึงข้อมูล room_status

        // ส่งข้อมูลไปยัง view
        return view('data', compact('users', 'rooms', 'room_types', 'room_status'));
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


    //Insert Update Delete Room_status
    public function insertRoomStatus(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'is_available' => 'required|boolean',
        ]);

        $roomStatus = new RoomStatus;
        $roomStatus->name = $request->name;
        $roomStatus->is_available = $request->is_available;
        $roomStatus->save();

        return redirect('/data')->with('success', 'Room Status inserted successfully');
    }

    public function editRoomStatus($id)
    {
        $roomStatus = RoomStatus::find($id);
        return view('edit-roomstatus', compact('roomStatus'));
    }

    public function updateRoomStatus(Request $request, $id)
    {
        $roomStatus = RoomStatus::find($id);
        $roomStatus->name = $request->name;
        $roomStatus->is_available = $request->is_available;
        $roomStatus->save();

        return redirect('/data')->with('success', 'Room Status updated successfully');
    }

    public function deleteRoomStatus($id)
    {
        $roomStatus = RoomStatus::find($id);
        $roomStatus->delete();

        return redirect('/data')->with('success', 'Room Status deleted successfully');
    }


    // insert update delete - Account
    public function insertAccount(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:accounts',
            'password' => 'required|min:8',
            'is_available' => 'required|boolean',
            'room_id' => 'nullable|integer',
            'room_status_id' => 'nullable|integer',
        ]);

        $account = new Account;
        $account->name = $request->name;
        $account->email = $request->email;
        $account->password = Hash::make($request->password);
        $account->is_available = $request->is_available;
        $account->room_id = $request->room_id;
        $account->room_status_id = $request->room_status_id;
        $account->save();

        return redirect('/data_view')->with('success', 'Account inserted successfully');
    }

    public function editAccount($id)
    {
        $account = Account::find($id);
        return view('edit-account', compact('account'));
    }

    public function updateAccount(Request $request, $id)
    {
        $account = Account::find($id);
        $account->name = $request->name;
        $account->email = $request->email;
        $account->password = Hash::make($request->password);
        $account->is_available = $request->is_available;
        $account->room_id = $request->room_id;
        $account->room_status_id = $request->room_status_id;
        $account->save();

        return redirect('/data_view')->with('success', 'Account updated successfully');
    }

    public function deleteAccount($id)
    {
        $account = Account::find($id);
        $account->delete();

        return redirect('/data_view')->with('success', 'Account deleted successfully');
    }


}
