<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('bank_accounts')->insert([
            [
                'checking_account' => 'BY20OLMP31350000001000001111',
                'bank_id' => '1',
                'currency_id' => '1',
                'organization_id' => '1',
            ],
            [
                'checking_account' => 'BY20OLMP31350000001000002222',
                'bank_id' => '1',
                'currency_id' => '2',
                'organization_id' => '1',
            ],
            [
                'checking_account' => 'BY20OLMP31350000001000003333',
                'bank_id' => '1',
                'currency_id' => '3',
                'organization_id' => '1',
            ],
            [
                'checking_account' => 'BY20OLMP31350000001000004444',
                'bank_id' => '2',
                'currency_id' => '1',
                'organization_id' => '1',
            ],
            [
                'checking_account' => 'BY20OLMP31350000001000005555',
                'bank_id' => '2',
                'currency_id' => '4',
                'organization_id' => '1',
            ],

        ]);
    }
}
