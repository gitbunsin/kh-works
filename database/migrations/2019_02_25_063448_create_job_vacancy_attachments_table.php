<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobVacancyAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_vacancy_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vacancy_id')->unsigned()->nullable();
            $table->foreign('vacancy_id', 'S2kr3PKvDJUDHFFFA9SDD5KNHiC0S0JWy3Ub1')->references('id')->on('job_vacancies')->onDelete('cascade');
            $table->string('file_name')->nullable();
            $table->string('file_type')->nullable();
            $table->string('file_size')->nullable();
            $table->string('file_content')->nullable();
            $table->string('attachment_type')->nullable();
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('job_vacancy_attachments');
    }
}
