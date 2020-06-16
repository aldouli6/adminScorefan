<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->integer('method_id')->unsigned();
            $table->integer('state_id')->unsigned();
            $table->biginteger('user_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->double('total');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('method_id')->references('id')->on('methods');
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('payments');
    }
}
