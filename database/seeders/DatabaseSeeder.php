<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(initTournamentSeeder::class);
        $this->call(initSeatAreasSeeder::class);
        $this->call(initSeatNunberSeeder::class);
        $this->call(initTeamsSeeder::class);
        $this->call(initGamesSeeder::class);
        $this->call(initGameTeamsSeeder::class);
        $this->call(initGameTimesSeeder::class);
        $this->call(initTicketsSeeder::class);
        $this->call(initAdminSeeder::class);
        $this->call(initWorkerSeeder::class);
    }
}
