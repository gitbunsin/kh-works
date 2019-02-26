<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_vacancies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_title_code')->unsigned()->nullable();
            $table->foreign('job_title_code', 'S2kr3PKvDFFFA9SDD5KNHiC0S0JWy3Ub1')->references('id')->on('job_titles')->onDelete('cascade');
           $table->integer('hiring_manager_id')->unsigned()->nullable();
           $table->string('name')->nullable();
           $table->string('description')->nullable();
           $table->integer('no_of_position')->nullable();
           $table->integer('status')->unsigned()->nullable();
           $table->integer('publish_in_feed')->unsigned()->nullable();
           $table->date('defined_time')->nullable();
           $table->date('update_time')->nullable();
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
        Schema::dropIfExists('job_vacancies');
    }
}
