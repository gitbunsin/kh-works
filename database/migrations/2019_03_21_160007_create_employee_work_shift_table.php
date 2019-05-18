<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeWorkShiftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_work_shift', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('work_shift_id')->unsigned()->nullable();
            $table->foreign('work_shift_id')->references('id')->on('work_shifts')->onDelete('cascade');


            $table->integer('employee_emp_number')->unsigned()->nullable();
            $table->foreign('employee_emp_number')->references('emp_number')->on('employees')->onDelete('cascade');


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
        Schema::dropIfExists('employee_work_shift');
    }
}
