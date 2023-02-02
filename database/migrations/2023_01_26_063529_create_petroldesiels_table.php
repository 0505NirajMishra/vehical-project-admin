<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     
    public function up()
    {
        Schema::create('petroldesiels', function (Blueprint $table) {
            $table->increments('petrol_id');
            $table->string('vehical_type');
            $table->string('fuel_type');
            $table->string('fuel_quantity');
            $table->string('vehical_registration_no');
            $table->string('vehical_image');
            $table->string('location');
            $table->string('longitude');
            $table->string('latitude');
            $table->tinyInteger('status')->default(0)->comment('0:pending,1:accept,2:cancel');
            $table->integer('user_id')->nullable();
            $table->integer('service_id')->nullable();
            $table->string('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('petroldesiels');
    }

};