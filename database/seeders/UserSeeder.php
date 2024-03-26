<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker; // นำเข้า Faker ที่ถูกต้อง

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // สร้าง instance ของ Faker
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name(), // ใช้ $faker ที่สร้างขึ้น
                'email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('password'),
                'created_at' => now(),
            ]);
        }
    }
}
