<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayperiodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payperiods', function (Blueprint $table) {
            $table->increments('id');
//            $table->integer('organization_code')->unsigned()->nullable();
//            $table->foreign('organization_code')->references('id')->on('organization_gen_infos')->onDelete('cascade');

            $table->string('name')->nullable();

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
        Schema::dropIfExists('payperiods');
    }
}
