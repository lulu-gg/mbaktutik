<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMerchandiseCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('merchandise_categories', function (Blueprint $table) {
            if (!Schema::hasColumn('merchandise_categories', 'description')) {
                $table->text('description')->nullable(); // Menambahkan kolom description
            }
            if (!Schema::hasColumn('merchandise_categories', 'deleted_at')) {
                $table->softDeletes(); // Menambahkan soft deletes
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('merchandise_categories', function (Blueprint $table) {
            if (Schema::hasColumn('merchandise_categories', 'description')) {
                $table->dropColumn('description');
            }
            if (Schema::hasColumn('merchandise_categories', 'deleted_at')) {
                $table->dropSoftDeletes();
            }
        });
    }
}
