<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Husam Abuhajjaj',
            'email' => 'delphix2012@gmail.com',
            'password' => Hash::make('123456'),
            'api_token' => '3FJBOdfSHhaQH8qc18qK18GDDvnwAVQldbPSRRcw024MJdnSHexiafNAQSN5', // google token
            'profile_image_url' => 'https://www.rd.com/wp-content/uploads/2017/09/01-shutterstock_476340928-Irina-Bg.jpg'
        ]);

        DB::table('users')->insert([
            'name' => 'Khaled',
            'email' => 'kme_mahomoud@gmail.com',
            'password' => Hash::make('123456'),
            'profile_image_url' => 'https://widgetwhats.com/app/uploads/2019/11/free-profile-photo-whatsapp-4.png'
        ]);
    }
}
