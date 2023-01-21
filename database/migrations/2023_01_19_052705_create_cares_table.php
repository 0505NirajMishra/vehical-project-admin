<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('cares', function (Blueprint $table) {
            $table->increments('care_id');
            $table->string('servicetype');
            $table->string('tyre_type');
            $table->string('vehical_type');
            $table->timestamps();
        });
    }

   

    public function down()
    {
        Schema::dropIfExists('cares');
    }
};