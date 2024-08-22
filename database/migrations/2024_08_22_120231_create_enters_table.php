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
        Schema::create('enters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('buyer_id'); # 外部キー
            $table->foreign('buyer_id')->references('id')->on('buyers');
            $table->time('enter_time')->nullable();
            $table->time('exit_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enters');
    }
};
