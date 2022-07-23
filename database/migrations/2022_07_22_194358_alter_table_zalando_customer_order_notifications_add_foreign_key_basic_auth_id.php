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
        Schema::table('zalando_order_notifications', function (Blueprint $table) {
            $table->unsignedBigInteger('authorization_basic_auth_id')->after('store_id');
            $table->foreign(
                'authorization_basic_auth_id',
                'order_notifications_authorization_basic_auth_id_foreign'
            )
                ->references('id')
                ->on('authorization_basic_auths');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('zalando_order_notifications', function (Blueprint $table) {
            $table->dropForeign('order_notifications_authorization_basic_auth_id_foreign');
            $table->dropColumn('authorization_basic_auth_id');
        });
    }
};
