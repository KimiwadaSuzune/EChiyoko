<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'トイレットペーパー',
                'price' => '564',
                'stock' => '100',
                'filepass' => 'test1.jpg',
                'enabled' => true,
                'category_id' => 1
            ],
            [
                'name' => '歯磨き粉',
                'price' => '225',
                'stock' => '99',
                'filepass' => 'test2.jpg',
                'enabled' => true,
                'category_id' => 1
            ],
            [
                'name' => '消臭スプレー',
                'price' => '264',
                'stock' => '98',
                'filepass' => 'test3.jpg',
                'enabled' => true,
                'category_id' => 1
            ],
        ]);
    }
}
