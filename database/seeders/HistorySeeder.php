<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('historys')->insert([
            [
                'user_id' => 1,
                'product_id' => 1,
                'amount' => 3,
                'purchased_at' => '2000-06-11',
                'total_price' => 1000,
            ],
            [
                'user_id' => 2,
                'product_id' => 2,
                'amount' => 3,
                'purchased_at' => '2000-06-14',
                'total_price' => 2000,
            ],
            [
                'user_id' => 3,
                'product_id' => 3,
                'amount' => 3,
                'purchased_at' => '1999-09-27',
                'total_price' => 3000,
            ],
        ]);
    }
}
