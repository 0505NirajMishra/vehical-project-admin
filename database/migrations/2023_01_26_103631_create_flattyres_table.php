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
            $table->string('tyre_size');
            $table->string('vehical_registration_no');
            $table->string('tyresize_image');
            $table->string('location');
            $table->string('longitude');
            $table->string('latitude');
            $table->string('description');
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('flattyres');
    }
};
