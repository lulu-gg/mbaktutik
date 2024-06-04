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
        Schema::table('ticket_variations', function (Blueprint $table) {
            $table->foreign(['event_id'], 'event_variations_event_id_fkey')->references(['id'])->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticket_variations', function (Blueprint $table) {
            $table->dropForeign('event_variations_event_id_fkey');
        });
    }
};
