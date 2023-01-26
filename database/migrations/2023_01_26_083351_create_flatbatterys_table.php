<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flatbatterys', function (Blueprint $table) {
            $table->increments('flatbattery_id');
            $table->string('vehical_type');
            $table->string('battery_photo');
            $table->string('vehical_registration_no');
            $table->string('vehical_image');
            $table->string('location');
            $table->string('longitude');
            $table->string('latitude');
            $table->string('description');
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
        Schema::dropIfExists('flatbatterys');
    }
};
