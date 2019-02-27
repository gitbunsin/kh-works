<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_licenses', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('emp_number')->unsigned()->nullable();
            $table->foreign('emp_number', 'S2kr3PKvDDDFJKJUDHFFih3sJKOSI9SDD5KNHiC0S0JWy3Ub1')->references('emp_number')->on('employees')->onDelete('cascade');

            $table->integer('license_id')->unsigned()->nullable();
            $table->foreign('license_id', 'S2kr3PKvDDDFJKJKOSI9SD5KNHiC0S0JWy3Ub1')->references('id')->on('licenses')->onDelete('cascade');

            $table->string('license_no')->nullable();
            $table->date('license_issued_date')->nullable();
            $table->date('license_expiry_date')->nullable();
            $table->string('country')->nullable();
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
        Schema::dropIfExists('employee_licenses');
    }
}
