<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ItemsReservsCreate extends Migration
{
    /**
     * Run the migrations
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('itemsReservs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('items');
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
