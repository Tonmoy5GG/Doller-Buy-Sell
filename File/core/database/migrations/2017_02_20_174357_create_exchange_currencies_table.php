<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExchangeCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchange_currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('currency_id');
            $table->integer('quantity');
            $table->integer('exchange_currency_id');
            $table->integer('exchange_quality');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('exchange_currencies');
    }
}
