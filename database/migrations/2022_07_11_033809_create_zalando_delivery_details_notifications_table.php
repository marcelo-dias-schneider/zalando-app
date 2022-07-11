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
        Schema::create('zalando_delivery_details_notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('zalando_order_notification_id');
            $table->string('delivery_tracking_number', 255);
            $table->string('delivery_carrier_name', 255);
            $table->string('return_tracking_number', 255);
            $table->string('return_carrier_name', 255);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zalando_delivery_details_notifications');
    }
};
