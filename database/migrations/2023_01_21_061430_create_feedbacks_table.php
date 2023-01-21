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
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->increments('feedback_id');
            $table->string('booking_date_time');
            $table->string('service_type');
            $table->string('service_status');
            $table->string('vehical_type');
            $table->string('tyre_type');
            $table->string('cust_detail');
            $table->string('shop_detail');
            $table->string('calling_status');
            $table->string('description');
            $table->string('next_call_date_time')->nullable();
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
        Schema::dropIfExists('feedbacks');
    }
};
