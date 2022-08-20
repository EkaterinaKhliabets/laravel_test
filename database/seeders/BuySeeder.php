<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BuySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('buys')->insert([
            [
                'order_id' => '1',
                'product_id' => '1',
                'quantity' => '1',
                'price' => '1800',
            ],
            [
                'order_id' => '1',
                'product_id' => '2',
                'quantity' => '1',
                'price' => '2000',
            ],
            [
                'order_id' => '2',
                'product_id' => '3',
                'quantity' => '1',
                'price' => '2700',
            ],
            [
                'order_id' => '3',
                'product_id' => '1',
                'quantity' => '6',
                'price' => '1800',
            ],
            [
                'order_id' => '4',
                'product_id' => '3',
                'quantity' => '1',
                'price' => '2700',
            ],
            [
                'order_id' => '5',
                'product_id' => '2',
                'quantity' => '2',
                'price' => '2000',
            ],
            [
                'order_id' => '5',
                'product_id' => '4',
                'quantity' => '1',
                'price' => '2500',
            ],
        ]);
    }
}

