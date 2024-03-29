<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RoomTypesSeeder::class,
            RoomsSeeder::class,
            RoomStatusTableSeeder::class,
            AccountSeeder::class,

        ]);
    }
}
