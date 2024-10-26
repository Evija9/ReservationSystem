<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PremisessReservsCreate extends Migration
{
    /**
     * Run the migrations
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('premisessReservs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('premises_id')->constrained('premisess');
            $table->foreignId('reservation_id')->constrained('reservations');
            $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     * 
     * @return void
     */
    public function down()
    {
        
    }
}
