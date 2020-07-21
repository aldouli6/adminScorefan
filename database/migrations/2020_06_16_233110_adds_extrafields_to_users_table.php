<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddsExtrafieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('team_id')->nullable()->unsigned();
            $table->string('api_token', 60)->unique()->nullable();
            $table->enum('user_type', ['user', 'admin'])->nullable();;
            $table->boolean('enabled')->default(true);
            $table->string('token_facebook')->nullable();
            $table->boolean('terms')->default(true);
            $table->boolean('privacy_notice')->default(true);
            $table->double('balance')->nullable();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
        });   
    }

    /**
     * Reverse the migrations. 
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['team_id']);
            $table->dropColumn('team_id');
            $table->dropColumn('api_token');
            $table->dropColumn('user_type');
            $table->dropColumn('enabled');
            $table->dropColumn('token_facebook');
            $table->dropColumn('terms');
            $table->dropColumn('privacy_notice');
            $table->dropColumn('balance');
        });
    }
}
