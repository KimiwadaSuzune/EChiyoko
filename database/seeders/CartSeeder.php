<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('carts')->insert([
            [
                'user_id' => 1,
                'product_id' => 1,
                'amount' => 3,
                'total_price' => 1000,
            ],
            [
                'user_id' => 2,
                'product_id' => 2,
                'amount' => 3,
                'total_price' => 2000,
            ],
            [
                'user_id' => 2,
                'product_id' => 1,
                'amount' => 3,
                'total_price' => 1111,
            ],
            [
                'user_id' => 3,
                'product_id' => 3,
                'amount' => 3,
                'total_price' => 3000,
            ],
        ]);
    }
}
