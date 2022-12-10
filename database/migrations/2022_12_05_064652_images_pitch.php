<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ImagesPitch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_imgPitch', function (Blueprint $table) {
            $table->increments('img_id'); 
            $table->string('img_name')->nullable();
            $table->integer('pitch_id')->nullable();
            $table->integer('time_up')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_imgPitch');
    }
}
