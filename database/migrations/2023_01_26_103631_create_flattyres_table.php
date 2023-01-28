<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('flattyres', function (Blueprint $table) {
            $table->increments('flattyre_id');
            $table->string('vehical_type');
            $table->string('tube_tyre');
            $table->string('tyre_width');
            $table->string('tyre_wheel_size');
            $table->string('tyre_speed_rating');
            $table->string('vehical_registration_no');
            $table->string('tyresize_image');
            $table->string('location');
            $table->string('longitude');
            $table->string('latitude');
            $table->integer('user_id')->nullable();
            $table->integer('service_id')->nullable();
            $table->string('description');
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('flattyres');
    }
    
};