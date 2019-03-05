<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeReporttosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_reporttos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('erep_sup_emp_number')->unsigned()->nullable();
            $table->foreign('erep_sup_emp_number')->references('emp_number')->on('employees')->onDelete('cascade');



            $table->integer('erep_reporting_mode')->unsigned()->nullable();
            $table->foreign('erep_reporting_mode')->references('id')->on('reporting_methods')->onDelete('cascade');

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
        Schema::dropIfExists('employee_reporttos');
    }
}
