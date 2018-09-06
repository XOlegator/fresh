<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEcomRefCurrencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ecom_ref_currency', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ctry_nm', 100);
            $table->string('ccy_nm', 100);
            $table->char('ccy', 3)->nullable();
            $table->smallInteger('ccy_nbr')->nullable()->unsigned();
            $table->smallInteger('ccy_mnr_unts')->nullable()->unsigned();
            $table->unique(['ctry_nm', 'ccy_nm']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ecom_ref_currency');
    }
}
