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
        Schema::create('volleyball_players', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('volleybal_team')->nullable();
            $table->foreign('volleybal_team')->references('id')->on('volleyball_teams')->onDelete('cascade');
            $table->string('player_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volleyball_players');
    }
};
