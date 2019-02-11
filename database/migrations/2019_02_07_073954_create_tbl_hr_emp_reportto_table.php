<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblHrEmpReporttoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hr_emp_reportto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('erep_sup_emp_number');
            $table->integer('erep_sub_emp_number');
            $table->integer('erep_reporting_method');
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
        Schema::dropIfExists('tbl_hr_emp_reportto');
    }
}
