<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoomStatus;
use Faker\Factory as Faker;

class RoomStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            RoomStatus::create([
                'name' => 'ห้อง ' . ($i + 1),
                'is_available' => $faker->boolean,
            ]);
        }
    }
}
