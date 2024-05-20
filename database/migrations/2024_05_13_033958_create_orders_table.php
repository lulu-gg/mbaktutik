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
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events');
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->bigInteger('quantity')->nullable();
            $table->decimal('total_amount', 10)->nullable();
            $table->string('payment_method')->nullable()->comment('Payment method used (e.g., credit card, bank transfer)');
            $table->bigInteger('payment_status')->nullable()->comment('ENUM(\'pending\', \'approved\', \'failed\')');
            $table->bigInteger('status')->nullable()->comment('Status of the ticket (0: inactive, 1: active, 2: scanned)');
            $table->bigInteger('invoice_id')->nullable();
            $table->timestamps(6);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
