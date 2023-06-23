<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => '小山',
                'email'=>'koyama@test.com',
                'password'=>Hash::make('password'),
            ],
            [
                'name' => '野村',
                'email' => 'nomura@test.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => '君和田',
                'email' => 'kimiwada@test.com',
                'password' => Hash::make('password'),
            ],
        ]);
    }
}
