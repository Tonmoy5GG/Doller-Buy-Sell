<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBonusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonuses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bonus_type');
            $table->string('percentage');
            $table->integer('member_id');
            $table->string('member_reference');
            $table->string('under_reference');
            $table->integer('sell_id');
            $table->integer('buy_id');
            $table->integer('exchange_id');
            $table->string('amount');
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
        Schema::drop('bonuses');
    }
}
