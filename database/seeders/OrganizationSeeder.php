<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('organizations')->insert([
            [
                'name' => 'ООО "Ромашка"',
                'unp' => '123456789',
                'address' => 'г. Минск, Независимости 162, 1 подъезд, 3 этаж, оф. 28',
                'phone' => '+375291234567',
                'email' => 'admin@gmail.com',
            ],
        ]);
    }
}
