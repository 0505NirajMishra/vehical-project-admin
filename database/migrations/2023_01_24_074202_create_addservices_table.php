<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('addservices', function (Blueprint $table) {
            $table->increments('service_id');
            $table->string('service_name');
            $table->string('service_logo');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('addservices');
    }
    
};