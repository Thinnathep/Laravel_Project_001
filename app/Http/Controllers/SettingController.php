<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // ตรวจสอบว่ามีการ use model User ที่เหมาะสม
use App\Models\Rooms;
use App\Models\RoomType;
use Illuminate\Support\Facades\Log;



class SettingController extends Controller
{
    public function index()
    {
        return view('setting');
    }


    public function index1()
    {
        // ตัวดึงข้อมูล
        $users = User::all();
        $rooms = Rooms::all();
        $room_types = RoomType::all(); // ดึงข้อมูล room_types
        return view('setting', compact('users', 'rooms', 'room_types'));
    }

    public function save(array $options = [])
    {
        // Correctly log the data being saved
        Log::info('Saving user: ' . json_encode($this->toArray()));

        // Call the parent save method
        return parent::save($options);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (Hash::check($request->currentPassword, $user->password)) {
            $user->password = Hash::make($request->newPassword);
            try {
                $user = Auth::user();
            } catch (\Exception $e) {
                // Log the error message
                Log::error('Error saving user: ' . $e->getMessage());

                // Optionally, return the error message to the user
                return redirect()->back()->with('error', 'An error occurred while changing the password.');
            }

            // Log the password change
            Log::info('Password changed successfully for user ID: ' . $user->id);

            return redirect()->back()->with('success', 'Password changed successfully.');
        } else {
            // Log the failed password change attempt
            Log::error('Failed to change password for user ID: ' . $user->id . '. Current password is incorrect.');

            return redirect()->back()->with('error', 'Current password is incorrect.');
        }

    }



}
