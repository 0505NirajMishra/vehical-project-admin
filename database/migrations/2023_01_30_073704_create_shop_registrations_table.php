<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('shop_registrations', function (Blueprint $table) {
            $table->increments('shop_id');
            $table->string('company_name');
            $table->string('gst_no');
            $table->string('owner_name');
            $table->string('address');
            $table->string('email');
            $table->string('mobile');
            $table->string('year_of_exper');
            $table->string('about_you');
            $table->string('password');
            $table->string('c_password');
            $table->string('work_place_photo');
            $table->string('profile_image');
            $table->string('location');
            $table->string('longitude');
            $table->string('latitude');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shop_registrations');
    }
};
