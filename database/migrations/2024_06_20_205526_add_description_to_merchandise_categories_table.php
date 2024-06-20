<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionToMerchandiseCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('merchandise_categories', function (Blueprint $table) {
            $table->text('description')->nullable();
        });
    }

    public function down()
    {
        Schema::table('merchandise_categories', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
}
