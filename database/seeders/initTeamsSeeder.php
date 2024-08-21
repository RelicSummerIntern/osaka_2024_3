<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Datetime;

class initTeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teams')->insert([
            'team_name' => 'A高校',
            'tournament_id' => 1,
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('teams')->insert([
            'team_name' => 'B高校',
            'tournament_id' => 1,
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('teams')->insert([
            'team_name' => 'C高校',
            'tournament_id' => 1,
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('teams')->insert([
            'team_name' => 'D高校',
            'tournament_id' => 1,
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('teams')->insert([
            'team_name' => 'E高校',
            'tournament_id' => 1,
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
        DB::table('teams')->insert([
            'team_name' => 'F高校',
            'tournament_id' => 1,
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
    }
}
