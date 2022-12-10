<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblPrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_price', function (Blueprint $table) {
            $table->increments('time_id'); 
            $table->integer('time_start')->nullable();
            $table->integer('time_end')->nullable();
            $table->integer('price')->nullable();
            $table->integer('pitch')->nullable();
            $table->integer('pitch_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_price');
    }
}
