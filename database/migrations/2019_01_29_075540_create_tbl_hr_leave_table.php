<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblHrLeaveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hr_leave', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id');
            $table->dateTime('date');
            $table->decimal('length_hours');
            $table->decimal('length_days');
            $table->integer('status');
            $table->string('comments');
            $table->integer('eave_request_id');
            $table->integer('leave_type_id');
            $table->integer('emp_number');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->tinyInteger('duration_type');
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
        Schema::dropIfExists('tbl_hr_leave');
    }
}
