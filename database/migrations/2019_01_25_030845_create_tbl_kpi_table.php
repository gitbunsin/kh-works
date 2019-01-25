<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblKpiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_kpi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_title_code');
            $table->string('kpi_indicators');
            $table->integer('min_rating');
            $table->integer('max_rating');
            $table->string('default_kpi');
            $table->string('deleted_at');
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
        Schema::dropIfExists('tbl_kpi');
    }
}
