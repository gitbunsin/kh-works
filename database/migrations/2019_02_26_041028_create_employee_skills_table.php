<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('emp_number')->unsigned()->nullable();
            $table->foreign('emp_number', 'S2kr3PKvDDDFJKJUDHFFlKKSHSiih3sJDLKOSI9SDD5KNHiC0S0JWy3Ub1')->references('emp_number')->on('employees')->onDelete('cascade');

            $table->integer('skill_id')->unsigned()->nullable();
            $table->foreign('skill_id', 'S2kr3PFFliih3sJDLKOSI9SDD5KNHiC0S0JWy3Ub1')->references('id')->on('skills')->onDelete('cascade');

            $table->decimal('years_of_exp')->unsigend()->nullable();
            $table->string('comments')->nullable();
            
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
        Schema::dropIfExists('employee_skills');
    }
}
