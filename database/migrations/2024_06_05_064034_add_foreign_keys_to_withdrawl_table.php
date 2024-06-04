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
        Schema::table('withdrawl', function (Blueprint $table) {
            $table->foreign(['event_organizer_id'], 'withdrawl_event_organizer_id_fkey')->references(['id'])->on('organizers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('withdrawl', function (Blueprint $table) {
            $table->dropForeign('withdrawl_event_organizer_id_fkey');
        });
    }
};
