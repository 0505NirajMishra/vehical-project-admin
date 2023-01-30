<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('vehicaladddetails', function (Blueprint $table) {
            $table->increments('vehicaladddetail_id');
            $table->string('vehical_type');
            $table->string('vehical_company_name');
            $table->string('vehical_name');
            $table->string('vehical_photo');
            $table->string('vehical_registration_no');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicaladddetails');
    }

};