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
        Schema::create('vehicle_returns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_vehicle_lending');
            $table->unsignedBigInteger('id_user_return');
            $table->string('last_gas');
            $table->integer('last_km');
            $table->integer('gas_money');
            $table->string('lending_status');
            $table->timestamps();
            $table->foreign('id_user_return')->references('id')->on('users');
            $table->foreign('id_vehicle_lending')->references('id')->on('vehicle_lendings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_returns');
    }
};
