<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellConfirmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_confirms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sell_id');
            $table->integer('transaction_id');
            $table->string('image');
            $table->string('name');
            $table->string('email');
            $table->tinyInteger('status');
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
        Schema::drop('sell_confirms');
    }
}
