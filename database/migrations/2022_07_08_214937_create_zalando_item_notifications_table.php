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
        Schema::create('zalando_item_notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('zalando_order_notification_id');
            $table->string('item_id', 255);
            $table->string('ean', 255);
            $table->string('price', 255);
            $table->string('currency', 255);
            $table->string('article_number', 255)->nullable()->default(null);
            $table->string('article_location', 255)->nullable()->default(null);
            $table->string('return_reason_code', 255)->nullable()->default(null);
            $table->string('return_location', 255)->nullable()->default(null);
            $table->string('cancellation_reason', 255)->nullable()->default(null);
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
        Schema::dropIfExists('zalando_item_notifications');
    }
};
