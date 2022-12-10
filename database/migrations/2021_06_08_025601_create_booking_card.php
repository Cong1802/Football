<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingCard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_booking_card', function (Blueprint $table) {
            $table->increments('booking_card_id');
            $table->integer('user_id');          
            $table->integer('field_id');            
            $table->string('booking_card_date');
            $table->string('booking_card_start');
            $table->string('booking_card_end');
            $table->string('booking_card_phone');
            $table->integer('booking_card_status');
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
        Schema::dropIfExists('tbl_booking_card');
    }
}
