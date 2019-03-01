<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaygradeCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paygrade_currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('max_salary',9,3);
            $table->decimal('min_salary',9,3);


            $table->integer('paygrade_id')->unsigned()->nullable();
            $table->foreign('paygrade_id')->references('id')->on('Paygrades')->onDelete('cascade');


            $table->integer('currency_id')->unsigned()->nullable();
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade');

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
        Schema::dropIfExists('paygrade_currencies');
    }
}
