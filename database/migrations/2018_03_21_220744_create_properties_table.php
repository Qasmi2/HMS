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
            $table->string('propertyType');
            $table->string('propertyName');
            $table->integer('noOfRoom')->unsigned();
            $table->string('streetAddress');
            $table->string('sector');
            $table->double('Latitude')->nullable();
            $table->double('Longitude')->nullable();
            $table->string('city');
            $table->tinyInteger('internet')->nullable();
            $table->tinyInteger('parking')->nullable();
            $table->tinyInteger('mess')->nullable();
            $table->tinyInteger('TvCabel')->nullable();
            $table->tinyInteger('RoomCleaning')->nullable();
            $table->tinyInteger('lundary')->nullable();
            $table->tinyInteger('cctvCamear')->nullable();
    
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
