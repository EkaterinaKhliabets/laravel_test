<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('products')->insert([
            [
                'name' => 'Samsung S20',
                'price' => '1800',
            ],
            [
                'name' => 'Samsung S20+',
                'price' => '2000',
            ],
            [
                'name' => 'Samsung S20 Ultra',
                'price' => '2700',
            ],
            [
                'name' => 'Samsung S21',
                'price' => '2500',
            ],
            [
                'name' => 'Samsung S21+',
                'price' => '2700',
            ],
            [
                'name' => 'Samsung S21 Ultra',
                'price' => '3000',
            ],
            [
                'name' => 'Apple iPhone 13',
                'price' => '4500',
            ],
            [
                'name' => 'Apple iPhone 12',
                'price' => '3000',
            ],
            [
                'name' => 'Apple iPhone 11',
                'price' => '2000',
            ],
            [
                'name' => 'Huawei P50 Pro',
                'price' => '1800',
            ],
            [
                'name' => 'Huawei P40 Lite',
                'price' => '1200',
            ],
            [
                'name' => 'Huawei Y5p',
                'price' => '2000',
            ],


        ]);
    }
}
