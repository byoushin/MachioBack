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
        Schema::create('mission_participations', function (Blueprint $table) {
            $table->unsignedBigInteger('mission_id');
            $table->unsignedBigInteger('team_id');
            $table->integer('flag');				
            $table->string('photo_evidence');					
            $table->time('achievement_time');			
            $table->timestamps();

            $table->foreign('mission_id')->references('mission_id')->on('missions');
            $table->foreign('team_id')->references('team_id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mission_participations');
    }
};
