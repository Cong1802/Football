<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblPitch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pitch', function (Blueprint $table) {
            $table->increments('pitch_id'); 
            $table->string('pitch_name')->nullable();
            $table->integer('pitch_manager')->nullable();
            $table->string('pitch_description')->nullable();
            $table->integer('pitch_city')->nullable();
            $table->integer('pitch_ward')->nullable();
            $table->integer('pitch_street')->nullable();
            $table->integer('pitch_address')->nullable();
            $table->string('pitch_link_map')->nullable();
            $table->string('pitch_time')->nullable();
            $table->string('pitch_status')->nullable();
            $table->string('pitch_district')->nullable();
            $table->string('pitch_extension')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_pitch');
    }
}
