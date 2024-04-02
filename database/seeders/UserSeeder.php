<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // สร้าง instance ของ Faker
        $faker = Faker::create();

        // เพิ่มผู้ใช้ที่มีสิทธิ์เป็น Superadmin
        DB::table('users')->insert([
            'name' => 'Superadmin',
            'email' => $faker->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'role' => 'superadmin', // เพิ่มค่า 'superadmin' ให้กับคอลัมน์ 'role'
            'remember_token' => Str::random(10),
            'created_at' => now(),
        ]);


        // // เพิ่มผู้ใช้ที่มีสิทธิ์เป็น Admin
        // DB::table('users')->insert([
        //     'name' => 'Admin User',
        //     'email' => $faker->unique()->safeEmail(),
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10),
        //     'created_at' => now(),
        // ]);

        // เพิ่มผู้ใช้ธรรมดา
        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(), // ใช้ Faker สร้างอีเมลที่ไม่ซ้ำกับอีเมลที่มีอยู่แล้ว
                'password' => Hash::make('password'),
                'role' => 'user', // เพิ่มค่า 'superadmin' ให้กับคอลัมน์ 'role'
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ]);
        }
    }
}
