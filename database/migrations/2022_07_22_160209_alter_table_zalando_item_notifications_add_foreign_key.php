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
        Schema::table('zalando_item_notifications', function (Blueprint $table) {
            $table->foreign('zalando_order_notification_id')->references('id')->on('zalando_order_notifications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('zalando_item_notifications', function (Blueprint $table) {
            $table->dropForeign('zalando_item_notifications_zalando_order_notification_id_foreign');
        });
    }
};
