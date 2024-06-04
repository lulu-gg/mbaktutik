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
        Schema::table('events', function (Blueprint $table) {
            $table->foreign(['event_category_id'], 'events_event_category_id_fkey')->references(['id'])->on('events_category');
            $table->foreign(['event_organizer_id'], 'events_event_organizer_id_fkey')->references(['id'])->on('organizers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign('events_event_category_id_fkey');
            $table->dropForeign('events_event_organizer_id_fkey');
        });
    }
};
