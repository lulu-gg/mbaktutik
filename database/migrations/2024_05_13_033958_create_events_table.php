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
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->unsignedBigInteger('event_category_id');
            $table->foreign('event_category_id')->references('id')->on('events_category');
            $table->string('description')->nullable();
            $table->string('location')->nullable();
            $table->string('banner')->nullable();
            $table->string('thumbnail')->nullable();
            $table->unsignedBigInteger('event_organizer_id');
            $table->foreign('event_organizer_id')->references('id')->on('organizers');
            $table->bigInteger('status')->nullable();
            $table->timestamps(6);
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->string('tnc')->nullable();
            $table->string('seo')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
