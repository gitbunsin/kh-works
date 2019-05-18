<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_history', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('candidate_id')->unsigned()->nullable();
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');

            $table->integer('vacancy_id')->unsigned()->nullable();
            $table->foreign('vacancy_id')->references('id')->on('vacancies')->onDelete('cascade');


            $table->string('candidate_vacancy_name')->nullable();

            $table->integer('interview_id')->unsigned()->nullable();
            $table->foreign('interview_id')->references('id')->on('interviews')->onDelete('cascade');

            $table->integer('performance_by')->unsigned()->nullable();
            $table->foreign('performance_by')->references('emp_number')->on('employees')->onDelete('cascade');

            $table->string('performed_date')->nullable();
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
        Schema::dropIfExists('candidate_history');
    }
}
