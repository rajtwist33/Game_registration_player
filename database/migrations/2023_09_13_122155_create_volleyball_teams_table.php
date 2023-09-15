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
        Schema::create('volleyball_teams', function (Blueprint $table) {
            $table->id();
            $table->string('team_name')->nullable();
            $table->string('address')->nullable();
            $table->string('captain_name')->nullable();
            $table->string('captain_phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volleyball_teams');
    }
};
