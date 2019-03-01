<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobCandidateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_candidate_histories', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('candidate_id')->unsigned()->nullable();
            $table->foreign('candidate_id')->references('id')->on('job_candidates')->onDelete('cascade');

            $table->integer('vacancy_id')->unsigned()->nullable();
            $table->foreign('vacancy_id')->references('id')->on('job_vacancies')->onDelete('cascade');

            $table->integer('interview_id')->unsigned()->nullable();
            $table->foreign('interview_id')->references('id')->on('job_interviews')->onDelete('cascade');

            $table->string('candidate_vacancy_name')->nullable();
            $table->integer('action')->nullable();

            $table->integer('performedBy')->nullable();

            $table->date('performed_by')->nullable();
            $table->text('note')->nullable();
            $table->string('interviewers')->nullable();

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
        Schema::dropIfExists('job_candidate_histories');
    }
}
