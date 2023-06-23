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
                'filepass' => 'test1',
                'enabled' => true,
                'category_id' => 1
            ],
        ]);
    }
}
