<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('proertyType');
            $table->string('propertyName');
            $table->integer('noOfRoom')->unsigned();
            $table->string('streetAddress');
            $table->string('sector');
            $table->double('Latitude');
            $table->double('Longitude');
            $table->string('city');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            

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
        Schema::dropIfExists('properties');
    }
}
