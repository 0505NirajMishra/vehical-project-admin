<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('towings', function (Blueprint $table) {
            $table->increments('towing_id');
            $table->string('vehical_type');
            $table->string('vehical_photo');
            $table->string('vehical_registration_no');
            $table->string('service_location');
            $table->string('service_longitude');
            $table->string('service_latitude');
            $table->string('description');
            $table->string('picanddroaddress');
            $table->tinyInteger('status')->default(0)->comment('0:pending,1:accept,2:cancel');
            $table->integer('user_id')->nullable();
            $table->integer('service_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('towings');
    }
    
};