<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblBooking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_booking', function (Blueprint $table) {
            $table->increments('booking_id');
            $table->integer('booking_user')->nullable();
            $table->integer('booking_pitch')->nullable();
            $table->integer('booking_pitch_type')->nullable();
            $table->integer('booking_type')->nullable();
            $table->integer('booking_time')->nullable();
            $table->integer('booking_date')->nullable();
            $table->integer('booking_time_cr')->nullable();
            $table->integer('booking_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_booking');
    }
}
