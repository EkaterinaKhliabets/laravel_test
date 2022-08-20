<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('clients')->insert([
            [
                'name' => 'Карусель',
                'user_id' => '1',
                'email' => 'e.v.khliabets.dop@gmail.com',
            ],
            [
                'name' => 'Добрый дом',
                'user_id' => '1',
                'email' => 'e.v.khliabets.dop@gmail.com',
            ],
            [
                'name' => 'Версаль',
                'user_id' => '2',
                'email' => 'e.v.khliabets.dop@gmail.com',
            ],
            [
                'name' => 'Забота',
                'user_id' => '2',
                'email' => 'e.v.khliabets.dop@gmail.com',
            ],
            [
                'name' => 'Аленка',
                'user_id' => '3',
                'email' => 'e.v.khliabets.dop@gmail.com',
            ],

        ]);
    }
}
