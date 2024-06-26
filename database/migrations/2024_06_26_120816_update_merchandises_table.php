<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMerchandisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('merchandises', function (Blueprint $table) {
            $table->foreignId('organizer_id')->after('merchandise_category_id')->constrained()->onDelete('cascade');
            $table->string('thumbnail')->nullable()->after('description');
            $table->string('image')->nullable()->after('thumbnail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('merchandises', function (Blueprint $table) {
            $table->dropForeign(['organizer_id']);
            $table->dropColumn('organizer_id');
            $table->dropColumn('thumbnail');
            $table->dropColumn('image');
        });
    }
}
