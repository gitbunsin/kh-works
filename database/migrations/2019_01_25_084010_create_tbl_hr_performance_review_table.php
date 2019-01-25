<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblHrPerformanceReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hr_performance_review', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status_id');
            $table->integer('employee_id');
            $table->integer('department_id');
            $table->integer('job_tittle_code');
            $table->date('work_period_start');
            $table->date('work_period_end');
            $table->date('due_date');
            $table->date('completed_date');
            $table->dateTime('activated_date');
            $table->string('final_comment');
            $table->integer('final_rate');

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
        Schema::dropIfExists('tbl_hr_performance_review');
    }
}
