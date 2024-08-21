<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Datetime;

class initSeatAreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('seat_areas')->insert([
            'name' => "中央指定席",
            'tournament_id' => 1,
            'price' => 4200,
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('seat_areas')->insert([
            'name' => "1塁側指定席",
            'tournament_id' => 1,
            'price' => 3700,
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('seat_areas')->insert([
            'name' => "3塁側指定席",
            'tournament_id' => 1,
            'price' => 3700,
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('seat_areas')->insert([
            'name' => "1塁側アルプス席",
            'tournament_id' => 1,
            'price' => 1400,
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('seat_areas')->insert([
            'name' => "3塁側アルプス席",
            'tournament_id' => 1,
            'price' => 1400,
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('seat_areas')->insert([
            'name' => "ライト外野指定席",
            'tournament_id' => 1,
            'price' => 700,
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('seat_areas')->insert([
            'name' => "レフト外野指定席",
            'tournament_id' => 1,
            'price' => 700,
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
    }
}
