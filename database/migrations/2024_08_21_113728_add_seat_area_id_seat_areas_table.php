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
        Schema::table('seat_number', function (Blueprint $table) {

            $table->foreign('seat_area_id')
            ->references('id')->on('seat_areas')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seat_number', function (Blueprint $table) {
            $table->dropForeign(['seat_area_id']);
        });
    }
};
