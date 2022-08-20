<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactFaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('contact_faces')->insert([
            [
                'name' => 'Иванов Иван Иванович',
                'position' => 'менеджер',
                'gender' => 'm',
                'status' => 'работает',
                'client_id' => '1',
            ],
            [
                'name' => 'Петров Петр Петрович',
                'position' => 'менеджер',
                'gender' => 'm',
                'status' => 'работает',
                'client_id' => '1',
            ],
            [
                'name' => 'Воронович Ирина Михайловна',
                'position' => 'менеджер',
                'gender' => 'w',
                'status' => 'работает',
                'client_id' => '2',
            ],
            [
                'name' => 'Гринкевич Валентина Васильевна',
                'position' => 'менеджер',
                'gender' => 'w',
                'status' => 'временно не работает',
                'client_id' => '2',
            ],
            [
                'name' => 'Юркевич Михаил Иванович',
                'position' => 'менеджер',
                'gender' => 'm',
                'status' => 'работает',
                'client_id' => '3',
            ],

        ]);
    }
}
