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
        Schema::table('zalando_delivery_details_notifications', function (Blueprint $table) {
            $table->foreign(
                'zalando_order_notification_id',
                'delivery_details_notifications_order_notification_id_foreign'
            )->references('id')->on('zalando_order_notifications');
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
            $table->dropForeign('delivery_details_notifications_order_notification_id_foreign');
        });
    }
};
