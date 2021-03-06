<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('organization_gen_infos')->onDelete('cascade');


            $table->integer('hiring_manager_id')->unsigned()->nullable();
            $table->foreign('hiring_manager_id')->references('emp_number')->on('employees')->onDelete('cascade');

            $table->integer('job_titles_code')->unsigned()->nullable();
            $table->foreign('job_titles_code')->references('id')->on('job_title')->onDelete('cascade');

            $table->string('name')->nullable();

            $table->text('job_description')->nullable();
            $table->text('job_requirements')->nullable();
            $table->integer('no_of_position')->nullable();
            $table->integer('status')->nullable();
            $table->integer('public_in_feed')->nullable();
            $table->date('closingDate')->nullable();
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
        Schema::dropIfExists('vacancies');
    }
}
