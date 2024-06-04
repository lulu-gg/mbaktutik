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
        Schema::create('general_parameter', function (Blueprint $table) {
            $table->increments('id');
            $table->string('seo_keyword')->nullable();
            $table->string('seo_description')->nullable();
            $table->decimal('transaction_tax', 7)->nullable();
            $table->timestamps();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('whatsapp_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_parameter');
    }
};
