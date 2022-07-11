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
        Schema::create('zalando_customer_billing_address_notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('zalando_order_notification_id');
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('address_line_1', 255);
            $table->string('address_line_2', 255)->nullable()->default(null);
            $table->string('address_line_3', 255)->nullable()->default(null);
            $table->string('zip_code', 255);
            $table->string('city', 255);
            $table->string('country_code', 255);
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
        Schema::dropIfExists('zalando_customer_billing_address_notifications');
    }
};
