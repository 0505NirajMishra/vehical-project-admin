<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('vehicalcategorys', function (Blueprint $table) {
            $table->increments('vehical_catgeory_id');
            $table->string('vehical_type_name');
            $table->string('vehical_category_type');
            $table->string('vehical_logo');
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('vehicalcategorys');
    }

    
};