<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('state_id')->unsigned();
            $table->integer('team_local_id')->unsigned();
            $table->integer('team_visitor_id')->unsigned();
            $table->integer('round_id')->unsigned();
            $table->dateTime('date_time');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('team_local_id')->references('id')->on('teams');
            $table->foreign('team_visitor_id')->references('id')->on('teams');
            $table->foreign('round_id')->references('id')->on('rounds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('matches');
    }
}
