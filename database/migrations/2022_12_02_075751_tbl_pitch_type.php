<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblPitchType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pitch_type', function (Blueprint $table) {
            $table->increments('pitch_type_id'); 
            $table->integer('pitch_type')->nullable();
            $table->integer('pitch_type_parent')->nullable();
            $table->string('pitch_type_description')->nullable();
            $table->string('pitch_type_img')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_pitch_type');
    }
}
