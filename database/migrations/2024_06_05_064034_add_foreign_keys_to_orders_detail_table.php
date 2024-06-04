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
        Schema::table('orders_detail', function (Blueprint $table) {
            $table->foreign(['order_id'], 'orders_detail_order_id_fkey')->references(['id'])->on('orders');
            $table->foreign(['ticket_variation_id'], 'orders_detail_ticket_id_fkey')->references(['id'])->on('ticket_variations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders_detail', function (Blueprint $table) {
            $table->dropForeign('orders_detail_order_id_fkey');
            $table->dropForeign('orders_detail_ticket_id_fkey');
        });
    }
};
