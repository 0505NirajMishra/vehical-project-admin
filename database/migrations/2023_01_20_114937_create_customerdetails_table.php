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
        Schema::create('customerdetails', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->string('shop_employee');
            $table->string('booking_date_time');
            $table->string('location');
            $table->string('servicetype');
            $table->string('service_status');
            $table->string('tyre_type');
            $table->string('vehical_type');
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
        Schema::dropIfExists('customerdetails');
    }
};
