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
        Schema::create('withdrawl', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('beneficiary_name')->nullable();
            $table->string('beneficiary_account')->nullable();
            $table->string('beneficiary_bank')->nullable();
            $table->decimal('amount', 255, 0)->nullable();
            $table->integer('status')->nullable();
            $table->bigInteger('event_organizer_id')->nullable();
            $table->string('notes')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('withdrawl');
    }
};
