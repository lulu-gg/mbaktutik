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
        Schema::table('events_scanner_job', function (Blueprint $table) {
            $table->foreign(['event_id'], 'events_scanner_job_event_id_fkey')->references(['id'])->on('events');
            $table->foreign(['user_id'], 'events_scanner_job_user_id_fkey')->references(['id'])->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events_scanner_job', function (Blueprint $table) {
            $table->dropForeign('events_scanner_job_event_id_fkey');
            $table->dropForeign('events_scanner_job_user_id_fkey');
        });
    }
};
