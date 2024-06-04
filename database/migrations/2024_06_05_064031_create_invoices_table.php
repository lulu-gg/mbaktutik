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
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('order_id')->nullable();
            $table->string('invoice_number')->nullable();
            $table->timestamp('date')->nullable();
            $table->timestamp('due_date')->nullable();
            $table->bigInteger('status')->nullable();
            $table->timestamps(6);
            $table->string('midtrans_snap_redirect')->nullable();
            $table->string('midtrans_snap_token')->nullable();
            $table->string('midtrans_order_id')->nullable();
            $table->decimal('subtotal', 10, 0)->nullable();
            $table->decimal('fee', 255, 0)->nullable();
            $table->decimal('total', 255, 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
