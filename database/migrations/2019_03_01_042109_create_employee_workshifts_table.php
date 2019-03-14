<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeWorkshiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_workshifts', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('work_shift_id')->unsigned()->nullable();
            $table->foreign('work_shift_id', 'S2kr3PKvDDDFJKJUDHFFFAJOOddksjidfe3sJD9SDD5KNHiC0S0JWy3Ub1')->references('id')->on('work_shifts')->onDelete('cascade');


             $table->integer('emp_number')->unsigned()->nullable();
             $table->foreign('emp_number', 'S2kr3PKvDDDFJKJUDHFFFAJIIKDJOOdddfe3sJD9SDD5KNHiC0S0JWy3Ub1')->references('emp_number')->on('employees')->onDelete('cascade');

            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id', 'S2kr3PKvDDDFJKJUDHFFFAJOOdddfe3sJDLKOSI9SDD5KNHiC0S0JWy3Ub1')->references('id')->on('organization_gen_infos')->onDelete('cascade');
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
        Schema::dropIfExists('employee_workshifts');
    }
}
