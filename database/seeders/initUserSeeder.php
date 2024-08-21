<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Datetime;

class initUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'userA',
            'email' => 'userA@test.com',
            'password' => bcrypt('password'),
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('users')->insert([
            'name' => 'userB',
            'email' => 'userB@test.com',
            'password' => bcrypt('password'),
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
    }
}
