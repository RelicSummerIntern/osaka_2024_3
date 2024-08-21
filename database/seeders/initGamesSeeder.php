<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Datetime;

class initGamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $start_time = (new DateTime('09:00:00'))->format('H:i:s');
        $end_time = (new DateTime('12:00:00'))->format('H:i:s');
        DB::table('games')->insert([
            'date' => date('Y-m-d H:i:s', strtotime('2024-08-23')),
            'scheduled_start_time' => $start_time,
            'scheduled_end_time' => $end_time,
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        $start_time = (new DateTime('12:00:00'))->format('H:i:s');
        $end_time = (new DateTime('15:00:00'))->format('H:i:s');
        DB::table('games')->insert([
            'date' => date('Y-m-d- H:i:s', strtotime('2024-08-23')),
            'scheduled_start_time' => $start_time,
            'scheduled_end_time' => $end_time,
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        $start_time = (new DateTime('15:00:00'))->format('H:i:s');
        $end_time = (new DateTime('18:00:00'))->format('H:i:s');
        DB::table('games')->insert([
            'date' => date('Y-m-d- H:i:s', strtotime('2024-08-23')),
            'scheduled_start_time' => $start_time,
            'scheduled_end_time' => $end_time,
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
    }
}
