<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('orders')->insert([
            [
                'client_id' => '1',
                'user_id' => '1',
                'bank_account_id' => '1',
                'currency_id' => '1',
                'total' => '3800',
                'total_cur' => '3800',
                'rate' => '1',
                'paid' => '1',
                'created_at' => Carbon::parse('2022-01-15'),
            ],
            [
                'client_id' => '1',
                'user_id' => '1',
                'bank_account_id' => '2',
                'currency_id' => '2',
                'total' => '2700',
                'total_cur' => '1000',
                'rate' => '2.70',
                'paid' => '1',
                'created_at' => Carbon::parse('2022-03-15'),
            ],
            [
                'client_id' => '2',
                'user_id' => '2',
                'bank_account_id' => '1',
                'currency_id' => '1',
                'total' => '10800',
                'total_cur' => '10800',
                'rate' => '1',
                'paid' => '1',
                'created_at' => Carbon::parse('2022-04-15'),
            ],
            [
                'client_id' => '2',
                'user_id' => '2',
                'bank_account_id' => '2',
                'currency_id' => '2',
                'total' => '2700',
                'total_cur' => '1000',
                'rate' => '2.7',
                'paid' => '1',
                'created_at' => Carbon::parse('2022-05-15'),
            ],
            [
                'client_id' => '3',
                'user_id' => '3',
                'bank_account_id' => '1',
                'currency_id' => '1',
                'total' => '6500',
                'total_cur' => '6500',
                'rate' => '1',
                'paid' => '1',
                'created_at' => Carbon::parse('2022-06-15'),
            ],

        ]);

    }
}

