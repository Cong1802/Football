<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_Team', function (Blueprint $table) {
            $table->increments('team_id');
            $table->string('team_name');
            $table->string('team_address');
            $table->string('team_level');
            $table->string('team_desc');
            $table->string('team_logo');
            $table->string('team_phone');
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
        Schema::dropIfExists('tbl_Team');
    }
}
