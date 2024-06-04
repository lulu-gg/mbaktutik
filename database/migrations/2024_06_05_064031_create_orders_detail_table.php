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
        Schema::create('orders_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ticket_variation_id')->nullable();
            $table->bigInteger('order_id')->nullable();
            $table->string('ticket_name')->nullable();
            $table->decimal('ticket_price', 10)->nullable();
            $table->timestamps();
            $table->string('buyer_name')->nullable();
            $table->string('buyer_nik')->nullable();
            $table->string('buyer_email')->nullable();
            $table->string('buyer_phone')->nullable();
            $table->bigInteger('quantity')->nullable();
            $table->decimal('price', 10)->nullable();
            $table->decimal('total', 10)->nullable();
            $table->string('buyer_city')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_detail');
    }
};
