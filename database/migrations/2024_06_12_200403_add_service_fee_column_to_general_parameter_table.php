<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddServiceFeeColumnToGeneralParameterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('general_parameter', function (Blueprint $table) {
            $table->integer('service_fee')->after('transaction_tax')->default(0);
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
            $table->dropColumn('service_fee');
        });
    }
}

