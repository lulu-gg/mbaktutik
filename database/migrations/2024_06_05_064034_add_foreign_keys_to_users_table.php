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
        Schema::table('users', function (Blueprint $table) {
            $table->foreign(['organizer_id'], 'users_organizer_id_fkey')->references(['id'])->on('organizers');
            $table->foreign(['role_id'], 'users_role_id_fkey')->references(['id'])->on('role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_organizer_id_fkey');
            $table->dropForeign('users_role_id_fkey');
        });
    }
};
