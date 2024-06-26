<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHandlingFeeToGeneralParameterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('general_parameter', function (Blueprint $table) {
            $table->decimal('handling_fee', 8, 2)->nullable()->after('transaction_tax');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('general_parameter', function (Blueprint $table) {
            $table->dropColumn('handling_fee');
        });
    }
}
