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
        Schema::table('local_notification', function (Blueprint $table) {
            $table->foreign(['user_id'], 'local_notification_user_id_fkey')->references(['id'])->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('local_notification', function (Blueprint $table) {
            $table->dropForeign('local_notification_user_id_fkey');
        });
    }
};
