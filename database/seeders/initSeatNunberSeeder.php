<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Datetime;

class initSeatNunberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('seat_number')->insert([
            'seat_area_id' => 1,
            'name' => 'A01',
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('seat_number')->insert([
            'seat_area_id' => 2,
            'name' => 'B02',
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('seat_number')->insert([
            'seat_area_id' => 3,
            'name' => 'C03',
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('seat_number')->insert([
            'seat_area_id' => 4,
            'name' => 'D04',
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('seat_number')->insert([
            'seat_area_id' => 5,
            'name' => 'E05',
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('seat_number')->insert([
            'seat_area_id' => 6,
            'name' => 'F06',
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('seat_number')->insert([
            'seat_area_id' => 7,
            'name' => 'G07',
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
    }
}
