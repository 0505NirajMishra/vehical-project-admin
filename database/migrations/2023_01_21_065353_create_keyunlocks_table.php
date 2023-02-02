<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('keyunlocks', function (Blueprint $table) {
            $table->increments('keyunlocks_id');
            $table->string('vehical_type');
            $table->string('vehical_photo');
            $table->string('vehical_registration_no');
            $table->string('service_location');
            $table->string('service_longitude');
            $table->string('service_latitude');
            $table->integer('user_id')->nullable();
            $table->integer('service_id')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0:pending,1:accept,2:cancel');
            $table->string('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('keyunlocks');
    }

};