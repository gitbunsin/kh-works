<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKpisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpis', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('job_titles_code')->unsigned()->nullable();
            $table->foreign('job_titles_code')->references('id')->on('job_title')->onDelete('cascade');

            $table->string('kpi_indicators')->nullable();
            $table->integer('min_rating')->nullable();
            $table->integer('max_rating')->nullable();
            $table->smallInteger('default_kpi')->nullable();
            $table->dateTime('deleted_at')->nullable();

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
        Schema::dropIfExists('kpis');
    }
}
