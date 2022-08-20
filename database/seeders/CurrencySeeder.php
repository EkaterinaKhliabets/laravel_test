<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('currencies')->insert([
            [
                'id_number' => '933',
                'character_code' => 'BYN',
                'name' => 'Белорусский рубль',
            ],
            [
                'id_number' => '978',
                'character_code' => 'EUR',
                'name' => 'Евро',
            ],
            [
                'id_number' => '840',
                'character_code' => 'USD',
                'name' => 'Доллар США',
            ],
            [
                'id_number' => '643',
                'character_code' => 'RUB',
                'name' => 'Российский рубль',
            ],
        ]);


    }
}
