<?php

namespace Database\Seeders;

use App\Models\PrivateMessage;
use App\Models\Room;
use Illuminate\Database\Seeder;

class PrivateMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PrivateMessage::create([
            'from_user_id' => 1,
            'to_user_id' => 2,
            'message' => 'I have sorted what manager asked me yesterday, can u send file to me please',
            'has_seen' => 1,
        ]);
        PrivateMessage::create([
            'from_user_id' => 1,
            'to_user_id' => 2,
            'message' => 'Please send to me',
            'has_seen' => 1,
        ]);
        PrivateMessage::create([
            'from_user_id' => 2,
            'to_user_id' => 1,
            'message' => 'Sure',
            'has_seen' => 0,
        ]);
    }
}
