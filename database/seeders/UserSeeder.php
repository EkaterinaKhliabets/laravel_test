<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            [
                'name' => 'Екатерина',
                'lastname' => 'Хлебец',
                'email' => 'e.v.khliabets@gmail.com',
                'phone' => '375295564550',
                //'email_verified_at' => now(),
                'password' => bcrypt('123'),
                //'remember_token' => Str::random(10),

                'is_admin' => 1,
                'not_valid' => 0,
                'organization_id' => 1,
            ],

            [
                'name' => 'Мухаммед',
                'lastname' => 'А.',
                'email' => 'muhammed@gmail.com',
                'phone' => '',
                //'email_verified_at' => now(),
                'password' => bcrypt('123'),
                //'remember_token' => Str::random(10),

                'is_admin' => 1,
                'not_valid' => 0,
                'organization_id' => 1,
            ],
        ]);
    }
}
