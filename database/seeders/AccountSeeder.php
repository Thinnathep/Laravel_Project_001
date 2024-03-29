<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker::create();

        // ดึงข้อมูลจากตาราง users
        $users = DB::table('users')->get()->toArray();

        // ดึงข้อมูลจากตาราง rooms
        $rooms = DB::table('rooms')->get()->toArray();

        // ดึงข้อมูลจากตาราง room_status
        $RoomStatus = DB::table('room_status')->get()->toArray();

        // เลือกเพียง 20 รายการแรกจากแต่ละตาราง
        $users = array_slice($users, 0, 10);
        $rooms = array_slice($rooms, 0, 10);
        $RoomStatus = array_slice($RoomStatus, 0, 10);

        // เพิ่มข้อมูลลงในตาราง accounts
        for ($i = 0; $i < 10; $i++) {
            Account::create([
                'name' => $users[$i]->name, // ใช้ชื่อจากตาราง users
                'email' => $users[$i]->email, // ใช้ชื่อจากตาราง users
                'password' => $users[$i]->password, // ใช้รหัสจากตาราง users
                'room_id' => $rooms[$i]->id, // ใช้ ID จากตาราง rooms
                'is_available' => $RoomStatus[$i]->is_available, // ใช้ค่าจากตาราง room_status
                'room_status_id' => $RoomStatus[$i]->id, // ใช้ ID จากตาราง rooms
            ]);
        }
    }






}
