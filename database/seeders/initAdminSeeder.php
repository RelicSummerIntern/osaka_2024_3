<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Datetime;

class initAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin')->insert([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
        ]);
    }
}
