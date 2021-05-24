<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create([
            'name' => 'General'
        ]);

        Room::create([
            'name' => 'Admin'
        ]);

        Room::create([
            'name' => 'Developers'
        ]);

        Room::create([
            'name' => 'Meeting'
        ]);
    }
}
