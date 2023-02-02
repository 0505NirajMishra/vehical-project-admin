<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up()
    {
        Schema::create('users', function (Blueprint $table) 
        {
            $table->id();
            $table->string('customer_name',150);
            $table->string('email',200);
            $table->string('customer_mobile',200);
            $table->string('password');
            $table->string('customer_cpassword');
            $table->tinyInteger('status')->default(0)->comment('0:pending,1:booked,2:completed,3:cancelled,4:cancel');
            $table->string('user_type');
            $table->string('fcm_token',200)->nullable();           
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
    
};