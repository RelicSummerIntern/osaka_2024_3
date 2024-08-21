<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Datetime;

class initGameTeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('game_team')->insert([
            'game_id' => 1,
            'team_id' => 1,
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('game_team')->insert([
            'game_id' => 1,
            'team_id' => 2,
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('game_team')->insert([
            'game_id' => 2,
            'team_id' => 3,
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('game_team')->insert([
            'game_id' => 2,
            'team_id' => 4,
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('game_team')->insert([
            'game_id' => 3,
            'team_id' => 5,
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('game_team')->insert([
            'game_id' => 3,
            'team_id' => 6,
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
    }
}
