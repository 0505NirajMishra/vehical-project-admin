<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('shopemployees', function (Blueprint $table) {
            $table->increments('shopemployee_id');
            $table->string('booking_date_time');
            $table->string('location');
            $table->string('longitute');
            $table->string('latitute');
            $table->string('service_name');
            $table->string('tyre_type');
            $table->string('vehical_type');
            $table->string('service_status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shopemployees');
    }
    
};