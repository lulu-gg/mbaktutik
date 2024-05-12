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
        Schema::create('ticket_variations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('event_id')->nullable();
            $table->string('name')->nullable();
            $table->decimal('price', 10, 0)->nullable();
            $table->bigInteger('quota')->nullable();
            $table->bigInteger('max_user_purchase')->nullable();
            $table->timestamps(6);
            $table->string('description')->nullable();
            $table->smallInteger('status')->nullable()->comment('0: deactive, 1: active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_variations');
    }
};
