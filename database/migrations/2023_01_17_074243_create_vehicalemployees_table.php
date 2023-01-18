<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('vehicalemployees', function (Blueprint $table) {
            $table->increments('vehical_employee_id');
            $table->string('vehical_service_type_exprt');
            $table->string('vehical_employee_name');
            $table->string('vehical_employee_profile');
            $table->string('vehical_company_name');
            $table->string('vehical_mobile');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicalemployees');
    }

};