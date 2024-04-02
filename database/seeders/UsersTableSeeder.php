<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // เพิ่มผู้ใช้ที่มีสิทธิ์เป็น Superadmin
        DB::table('users')->insert([
            'name' => 'Superadmin User',
            'email' => $faker->unique()->safeEmail(), // ใช้ Faker สร้างอีเมลที่ไม่ซ้ำกับอีเมลที่มีอยู่แล้ว
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'role' => 'superadmin',
        ]);

        // เพิ่มผู้ใช้ธรรมดา
        DB::table('users')->insert([
            'name' => 'Regular User',
             'email' => $faker->unique()->safeEmail(), // ใช้ Faker สร้างอีเมลที่ไม่ซ้ำกับอีเมลที่มีอยู่แล้ว
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'role' => 'user',
        ]);

        // สร้างผู้ใช้ที่สุ่ม
        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'), // ใช้ password ที่มีความปลอดภัย
                'remember_token' => Str::random(10),
                'role' => 'user',
            ]);
        }
    }
}
