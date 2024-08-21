<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Datetime;

class initGameTimesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $start_time = (new DateTime('09:00:00'))->format('H:i:s');
        DB::table('game_times')->insert([
            'game_id' => 1,
            'actual_start_time' => $start_time,
            'actual_end_time' => "",
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('game_times')->insert([
            'game_id' => 2,
            'actual_start_time' => "",
            'actual_end_time' => "",
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('game_times')->insert([
            'game_id' => 3,
            'actual_start_time' => "",
            'actual_end_time' => "",
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
    }
}
