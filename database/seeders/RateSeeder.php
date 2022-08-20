<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('rates')->insert([
            [
                'date' => '2022-01-01',
                'rate' => '1',
                'scale' => '1',
                'currency_id' => '1',
            ],
        ]);
    }
}
