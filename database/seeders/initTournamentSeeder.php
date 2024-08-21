<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Datetime;

class initTournamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tournament')->insert([
            'tournament_name' => "第106回全国高等学校野球選手権大会",
            'created_at' => new Datetime,
            'updated_at'  => new Datetime,
        ]);
    }
}
