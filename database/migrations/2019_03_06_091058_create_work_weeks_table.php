<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkWeeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_weeks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('organization_gen_infos')->onDelete('cascade');

            $table->integer('operational_country_id')->unsigned()->nullable();
            $table->foreign('operational_country_id')->references('id')->on('operational_countries')->onDelete('cascade');

            $table->tinyInteger('mon')->nullable();
            $table->tinyInteger('tue')->nullable();
            $table->tinyInteger('wed')->nullable();
            $table->tinyInteger('thu')->nullable();
            $table->tinyInteger('fri')->nullable();
            $table->tinyInteger('sat')->nullable();
            $table->tinyInteger('sun')->nullable();


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
        Schema::dropIfExists('work_weeks');
    }
}
