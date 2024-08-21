<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Datetime;

class initWorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('worker')->insert([
            'name' => 'worker',
            'email' => 'worker@test.com',
            'password' => bcrypt('password'),
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
    }
}
