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
        Schema::table('tickets', function (Blueprint $table) {
            $table->foreign(['order_detail_id'], 'tickets_order_detail_id_fkey')->references(['id'])->on('orders_detail');
            $table->foreign(['scanned_by'], 'tickets_scanned_by_fkey')->references(['id'])->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign('tickets_order_detail_id_fkey');
            $table->dropForeign('tickets_scanned_by_fkey');
        });
    }
};
