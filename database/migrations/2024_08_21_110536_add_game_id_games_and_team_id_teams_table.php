<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('game_team', function (Blueprint $table) {

            $table->foreign('game_id')
            ->references('id')->on('games')
            ->onDelete('cascade');

            $table->foreign('team_id')
            ->references('id')->on('teams')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('game_team', function (Blueprint $table) {
            $table->dropForeign(['game_id']);
            $table->dropForeign(['team_id']);
        });
    }
};
