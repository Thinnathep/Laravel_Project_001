<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RoomTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('room_types')->insert([
            'name' => 'ห้องเรียน'
        ]);
        DB::table('room_types')->insert([
            'name' => 'ห้องประชุม'
        ]);
        DB::table('room_types')->insert([
            'name' => 'coworking'
        ]);
    }
}
