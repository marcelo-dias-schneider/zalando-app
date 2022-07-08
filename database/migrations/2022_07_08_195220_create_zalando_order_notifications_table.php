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
        Schema::create('zalando_order_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('event_id', 255);
            $table->string('order_id', 255);
            $table->string('order_number', 255);
            $table->string('state', 255);
            $table->string('store_id', 255);
            $table->string('timestamp', 255);
            $table->softDeletes();
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
        Schema::dropIfExists('zalando_order_notifications');
    }
};
