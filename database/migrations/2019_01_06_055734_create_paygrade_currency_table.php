<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaygradeCurrencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paygrade_currency', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('max_salary',9,3);
            $table->decimal('min_salary',9,3);
            $table->integer('paygrade_id')->unsigned();
            $table->integer('currency_id')->unsigned();
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
        Schema::dropIfExists('paygrade_currency');
    }
}
