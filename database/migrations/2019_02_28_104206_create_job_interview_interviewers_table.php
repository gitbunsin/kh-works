<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobInterviewInterviewersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_interview_interviewers', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('interview_id')->unsigned()->nullable();
            $table->foreign('interview_id')->references('id')->on('job_interviews')->onDelete('cascade');


            $table->integer('interviewer_id')->unsigned()->nullable();
            $table->foreign('interviewer_id')->references('emp_number')->on('employees')->onDelete('cascade');

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
        Schema::dropIfExists('job_interview_interviewers');
    }
}
