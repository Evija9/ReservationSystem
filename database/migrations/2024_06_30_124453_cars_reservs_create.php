<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CarsReservsCreate extends Migration
{
    /**
     * Run the migrations
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('carsReservs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->constrained('cars');
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
