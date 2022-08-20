<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('banks')->insert([
            [
                'name' => 'Беларусбанк',
                'BIK' => '123456789',
                'city' => 'Минск',
                'address' => 'пр. Маяковского 12',
                'phone' => '+375171234567',
            ],
            [
                'name' => 'Альфа-банк',
                'BIK' => '123456788',
                'city' => 'Минск',
                'address' => 'пр. Независимости 188',
                'phone' => '+375177654312',
            ],
            [
                'name' => 'Приорбанк',
                'BIK' => '987654321',
                'city' => 'Минск',
                'address' => 'ул. Тимирязева, 64',
                'phone' => '+375171111111',
            ],
        ]);
    }
}
