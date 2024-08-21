<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Datetime;

class initTicketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tickets')->insert([
            'game_id' => 1,
            'seat_number_id' => 1,
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('tickets')->insert([
            'game_id' => 1,
            'seat_number_id' => 2,
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('tickets')->insert([
            'game_id' => 1,
            'seat_number_id' => 3,
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('tickets')->insert([
            'game_id' => 1,
            'seat_number_id' => 4,
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('tickets')->insert([
            'game_id' => 1,
            'seat_number_id' => 5,
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('tickets')->insert([
            'game_id' => 1,
            'seat_number_id' => 6,
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('tickets')->insert([
            'game_id' => 1,
            'seat_number_id' => 7,
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
    }
}
