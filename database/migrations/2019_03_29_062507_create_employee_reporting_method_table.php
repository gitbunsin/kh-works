<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeReportingMethodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_reporting_method', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('employee_emp_number')->unsigned()->nullable();
            $table->foreign('employee_emp_number')->references('emp_number')->on('employees')->onDelete('cascade');



            $table->integer('reporting_method_id')->unsigned()->nullable();
            $table->foreign('reporting_method_id')->references('id')->on('reporting_methods')->onDelete('cascade');


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
        Schema::dropIfExists('employee_reporting_method');
    }
}
